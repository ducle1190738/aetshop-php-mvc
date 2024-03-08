function DeleteAllitemWishList(makh) {
    Swal.fire({
        title: 'Bạn có muốn xóa tất cả sản phẩm trong danh sách yêu thích?',
        text: "Bạn có thể thêm lại khi cần",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#20b130',
        cancelButtonColor: '#f20000',
        confirmButtonText: 'Đồng ý!',
        cancelButtonText: "Không đồng ý",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Đã xóa tất cả!',
            )
            setTimeout(window.location = 'index.php?action=User&act=wishlist&do=DeleteAll&id=' + makh, 3500)
        }
    })
}

function AskBeforeDelete(makh, mahh) {
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
            setTimeout(window.location = 'index.php?action=User&act=wishlist&do=DeleteItem&id=' + makh + '&item=' + mahh, 3500)
        }
    })
}