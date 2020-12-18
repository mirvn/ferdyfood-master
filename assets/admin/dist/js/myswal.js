const flashdata = $('.flash-data').data('flashdata');
const type = $('.flash-data').data('type');
console.log(flashdata + type)
if (flashdata) {
	if (type == 1) {
		Swal.fire(
			flashdata,
			'',
			'success'
		)
	} else if (type == 2) {
		Swal.fire(
			flashdata,
			'',
			'warning'
		)
	} else if (type == 3) {
		Swal.fire(
			flashdata,
			'',
			'error'
		)
	}

}

$('.logout').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin akan logout?',
		text: "",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya',
		cancelButtonText: 'Tidak'
	}).then((result) => {
		if (result.value) {
			document.location.href = href
		}
	})
});

$('.delete').on('click', function (e) {
	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
		title: 'Yakin akan dihapus?',
		text: "",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Ya',
		cancelButtonText: 'Tidak'
	}).then((result) => {
		if (result.value) {
			document.location.href = href
		}
	})
});
