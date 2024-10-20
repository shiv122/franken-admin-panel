import axios from 'axios';




/**
 * Rebound function to handle form submissions and AJAX requests with various options.
 * @param {Object} options - Configuration options for the request.
 * @param {HTMLFormElement|string|null} options.form - The form element or selector.
 * @param {Object|FormData|null} options.data - Data to be sent with the request.
 * @param {string} [options.method='POST'] - HTTP method for the request.
 * @param {string|null} options.url - URL for the request.
 * @param {Object} [options.headers={}] - Additional headers for the request.
 * @param {boolean} [options.refresh=false] - Whether to refresh the page on success.
 * @param {boolean} [options.reset=true] - Whether to reset the form on success.
 * @param {boolean} [options.reload=false] - Whether to reload the page on success.
 * @param {string|null} [options.redirect=null] - URL to redirect to on success.
 * @param {boolean} [options.notification=true] - Whether to show notifications.
 * @param {string} [options.asyncType='notification'] - Type of async handling ('notification', 'block', 'none').
 * @param {boolean} [options.logging=true] - Whether to log errors to the console.
 * @param {Function|null} [options.onResolve=null] - Callback function on success.
 * @param {Function|null} [options.onReject=null] - Callback function on error.
 * @returns {Promise} - A promise that resolves with the response or rejects with an error.
 */
globalThis.rebound = async (options) => {
    const defaultOptions = {
        form: null,
        data: null,
        method: 'POST',
        url: null,
        headers: {},
        refresh: false,
        reset: true,
        reload: false,
        redirect: null,
        notification: true,
        asyncType: 'notification', // 'notification', 'block', or 'none'
        logging: true,
        onResolve: null,
        onReject: null,
    };

    const {
        form,
        data,
        method,
        url,
        headers,
        refresh,
        reset,
        reload,
        redirect,
        notification,
        asyncType,
        logging,
        onResolve,
        onReject,
    } = { ...defaultOptions, ...options };

    if (!url) {
        throw new Error('No URL provided in rebound()');
    }

    if (form === null && data === null) {
        throw new Error('No form or data provided in rebound()');
    }

    let formElement = null;
    let formData = null;

    if (form !== null) {
        formElement = (typeof form === 'string') ? document.querySelector(form) : form;
        if (!(formElement instanceof HTMLFormElement)) {
            throw new Error('Invalid form element provided');
        }
        formData = new FormData(formElement);
    } else if (data instanceof FormData) {
        formData = data;
    } else if (typeof data === 'object' && data !== null) {
        formData = new FormData();
        Object.entries(data).forEach(([key, value]) => {
            formData.append(key, value);
        });
    } else {
        formData = data;
    }

    const button = formElement?.querySelector('button[type="submit"]');
    const originalButtonText = button?.innerHTML;

    if (button) {
        button.disabled = true;
        button.innerHTML = '<div uk-spinner></div>';
    }

    const axiosConfig = {
        method,
        url,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
            ...headers,
        },
        data: formData instanceof FormData ? formData : formData,
    };

    if (formData instanceof FormData) {
        axiosConfig.headers['Content-Type'] = 'multipart/form-data';
    }

    const handleSuccess = (response) => {
        if (notification) {
            notifier.success(response.data.message || 'Success', {
                labels: {
                    success: "Success"
                }
            });
        }

        if (reload) {
            window.location.reload();
        } else if (redirect || response.data.redirect) {
            window.location.href = redirect || response.data.redirect;
        } else if (refresh || response.data.refresh) {
            window.location.reload();
        }

        if (reset && formElement) {
            formElement.reset();
            formElement.querySelectorAll('input').forEach(input => {
                input.value = '';
                input.dispatchEvent(new Event('change'));
            });
        }

        if (onResolve) {
            onResolve(response);
        }

        return response;
    };

    const handleError = (error) => {
        if (error.response?.status === 422) {
            const errors = error.response.data.errors;

            Object.entries(errors).forEach(([key, value]) => {
                const messages = Array.isArray(value) ? value : [value];
                messages.forEach(message => {
                    notifier.alert(message, {
                        labels: {
                            alert: "Error"
                        }
                    });
                });

                if (formElement && !document.activeElement) {
                    formElement.querySelector(`[name="${key}"]`)?.focus();
                }

                if (logging) {
                    console.error(key, value);
                }
            });
        } else {
            const errorMessage = error.response?.data?.message || 'Something went wrong';
            notifier.alert(errorMessage, {
                labels: {
                    alert: "Error"
                }
            });
        }

        if (onReject) {
            onReject(error);
        }
        resetButton();
        throw error;
    };

    const resetButton = () => {
        if (button) {
            button.disabled = false;
            button.innerHTML = originalButtonText;
        }
    };

    let response;

    switch (asyncType) {
        case 'notification':
            response = await new Promise((resolve, reject) => {
                notifier.async(
                    axios(axiosConfig),
                    (res) => resolve(handleSuccess(res)),
                    (err) => reject(handleError(err))
                );
            });
            break;
        case 'block':
            response = await new Promise((resolve, reject) => {
                notifier.asyncBlock(
                    axios(axiosConfig),
                    (res) => resolve(handleSuccess(res)),
                    (err) => reject(handleError(err))
                );
            });
            break;
        case 'none':
        default:
            response = await axios(axiosConfig);
            response = handleSuccess(response);
            break;
    }
    resetButton();
    return response;
};