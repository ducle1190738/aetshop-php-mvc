function NoProductInCart() {
    Swal.fire({
        title: 'Trong giỏ không có hàng bạn sẽ được chuyển đến shop',
        icon: 'info',
        confirmButtonColor: '#20b130',
        confirmButtonText: 'Xem những sản phẩm khác',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = 'index.php?action=Shop'
        }
    })
}

function UpdateItem() {
    Swal.fire({
        icon: 'success',
        title: 'Thông báo',
        text: 'Cập nhật giỏ hàng thành công',
    })
}

function DeleteAll() {
    Swal.fire({
        title: 'Bạn có muốn xóa tất cả sản phẩm trong giỏ hàng?',
        text: "Bạn có thể thêm lại khi cần",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#20b130',
        cancelButtonColor: '#f20000',
        confirmButtonText: 'Đồng ý!',
        cancelButtonText: "Không đồng ý!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Đã xóa tất cả sản phẩm!',
            )
            setTimeout(window.location = 'index.php?action=Cart&act=deleteAll', 3500)
        }
    })
}

function AskBeforeDelete(id) {
    Swal.fire({
        title: 'Bạn có muốn xóa sản phẩm?',
        text: "Bạn có thể thêm lại khi cần",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#20b130',
        cancelButtonColor: '#f20000',
        confirmButtonText: 'Đồng ý!',
        cancelButtonText: "Không đồng ý!",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Đã xóa !',
            )
            setTimeout(window.location = 'index.php?action=Cart&act=detete_item&id=' + id, 3500)
        }
    })
}
