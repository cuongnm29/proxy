function startLoading(element) {
	let loadingHTML = 'Đang xử lý...'
	$(element).html(loadingHTML).attr('disabled', true)
}

function stopLoading(element, html = 'Submit', recaptcha = false) {
	if (recaptcha == true) grecaptcha.reset()
	$(element).html(html).removeAttr('disabled')
}

function showNotification(title = 'Oops...', text = 'Oops...', icon = 'success', options = {}) {
	let mySwal = Swal.mixin({
		scrollbarPadding: false,
		heightAuto: false,
		confirmButtonText: 'Đồng ý',
		cancelButtonText: 'Thôi',
	})
	if (typeof title === 'object') {
		return mySwal.fire(title)
	} else {
		return mySwal.fire({
			icon: icon,
			title: title,
			text: text,
			...options,
			// footer: '<a href="">Why do I have this issue?</a>'
		})
	}
}

function ajaxSuccess(json) {
	if (json.forced === true) {
		processing(json)
	} else {
		if (json.error == true) {
			Swal.fire('Thất bại', json.message, 'error').then(() => processing(json))
		} else if (json.error == false) {
			Swal.fire('Thành công', json.message, 'success').then(() => processing(json))
		}
	}

	function processing(json) {
		if (json.reload) location.reload()
		if (json.redirect) location.href = json.redirect
	}
}

function ajaxError(error) {
	alert(JSON.stringify(error))
}

function showToastr(icon = 'success', title, position = 'top-end', options = {}) {
	let Toast = Swal.mixin({
		toast: true,
		position: position,
		showConfirmButton: false,
		timer: 6000,
		timerProgressBar: true,
		...options,
		didOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
		},
	})
	return Toast.fire({
		icon: icon,
		title: title,
	})
}

function formatNumber(number, sign = true) {
	let ext = ''
	if (sign == true) ext = ' đ'
	return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',') + ext
	// return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'VND', maximumSignificantDigits: 2 }).format(number)
}

var transaction_status = {
	Pending: {
		title: 'Đang xử lý',
		state: 'primary',
	},
	Success: {
		title: 'Thành công',
		state: 'success',
	},
	Failed: {
		title: 'Thất bại',
		state: 'danger',
	},
	Canceled: {
		title: 'Canceled',
		state: 'warning',
	},
}

console.log('%c Coder Truong Quoc Bao %c', 'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:20px;color:#00ff3f;-webkit-text-fill-color:#00ff3f;-webkit-text-stroke: 1px #00bbee;', 'font-size:12px;color:#999999;')
// console.log('%c Contact: https://www.facebook.com/baoint/ %c', 'font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:20px;color:#00ff3f;-webkit-text-fill-color:#00ff3f;-webkit-text-stroke: 1px #00bbee;', 'font-size:12px;color:#999999;')
