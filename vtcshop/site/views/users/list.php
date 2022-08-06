<?php
    $users = $this->data['subcontent']['user'];
    $pageTotal = $this->data['subcontent']['pageTotal'];
?>


<div class="wrapper">
    <div class="dashboard_content">
        <div class="dashboard_content_breadcrumb">
            <p class="breadcrumb-text">DANH SÁCH NGƯỜI DÙNG</p>
            <ul class="breadcrumb-link">
                <li>
                    <a href="<?php echo _WEB_ROOT ?>/admin/home">Trang chủ</a>
                </li>
                <li>
                    <a href="">Danh sách người dùng</a>
                </li>
            </ul>
        </div>
        <div class="search">
            <input type="text" placeholder="tìm..." id="search">
        </div>
        <div id="dataPage">
        <table class="dashboard_content_table">
            <thead>
                <tr>
                    <th class="c1">STT</th>
                    <th class="c2">Quyền hạn</th>
                    <th class="c3">Họ tên</th>
                    <th class="c4">Tên đăng nhập</th>
                    <th class="c5">Email</th>
                    <th class="c6">Số điện thoại</th>
                </tr>
            </thead>
            <tbody class="table-scroll">
                <?php $num = 1; foreach($users as $user): ?>
                <tr>
                    <td class="c1"><?php echo $num; ?></td>
                    <td class="c2"><?php echo $user['name']; ?></td>
                    <td class="c3"><?php echo $user['fullname']; ?></td>
                    <td class="c4"><?php echo $user['username']; ?></td>
                    <td class="c5"><?php echo $user['email']; ?></td>
                    <td class="c6"><?php echo $user['phone_number']; ?></td>
                    <td class="c7 btn-delete" id="btn-open-modal-<?php echo $user['id']; ?>">Xóa</td>
                    <?php echo $user['name'] !== 'Khách'?'<td class="c7 btn-edit">'.
                    '<a href="'._WEB_ROOT.'/admin/user/editUser?id='.$user['id'].'" id="btn-edit-'.$user['id'].'">Sửa</a></td>' : false ?>
                </tr>
                <?php $num++; endforeach; ?>
            </tbody>
        </table>
        </div>

        <div class="cate_footer">
            <div class="pagination">
                <div class="pagination-container">
                    <div class="pagination-hover-overlay"></div>
                    <a class="pagination-prev" id="prev">
                        <span class="icon-pagination icon-pagination-prev">
                            <i class="icon material-icons">
                                keyboard_arrow_left
                            </i>
                        </span>
                    </a>
                    <?php for($i = 1; $i <= $pageTotal; $i++): ?>
                    <a class="pagination-page-number" id="page-<?php echo $i; ?>"><?php echo $i; ?></a>
                    <?php endfor; ?>
                    <a class="pagination-next" id="next">
                        <span class="icon-pagination icon-pagination-next">
                            <i class="icon material-icons">
                                keyboard_arrow_left
                            </i>
                        </span>
                    </a>
                </div>
            </div>
        <script src="<?php echo _WEB_ROOT; ?>/public/assets/JS/pagination.js"></script>
        </div>
        <div class="btn-add"><a href="<?php echo _WEB_ROOT; ?>/admin/user/addUser">Thêm người dùng</a></div>
    </div>
</div>
<?php foreach($users as $user): ?>
    <div class="modalSuccess">
        <div class="modalD modalD-<?php echo $user['id'] ?>">
            <div class="modal_content">
                <div class="modal_content_header">Thông báo</div>
                <div class="modal_content_body">
                    <p>Xác nhận xóa người dùng này!</p>
                </div>
                <div class="modal_content_footer">
                    <div class="btn-close" id="btn-close-<?php echo $user['id']; ?>">Hủy</div>
                    <div class="btn-delete" id="btn-delete-<?php echo $user['id']; ?>">Xác nhận</div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            
            <?php foreach($users as $user): ?>
                const modal<?php echo $user['id'] ?> = document.querySelector('.modalD-<?php echo $user['id'] ?>');
                $('#btn-open-modal-<?php echo $user['id']; ?>').click(function() {
                    modal<?php echo $user['id'] ?>.classList.add('open');
                });
                $('#btn-close-<?php echo $user['id']; ?>').click(function() {
                    modal<?php echo $user['id'] ?>.classList.remove('open');
                });
                $('#btn-delete-<?php echo $user['id']; ?>').click(function() {
                    const id = <?php echo $user['id']; ?>;
                    $.ajax({
                        url: '<?php echo _WEB_ROOT; ?>/admin/user/deleteUser',
                        method: 'GET',
                        data: {id:id}
                    })
                    window.location.reload();
                })
            <?php endforeach; ?>

            <?php for($i = 1; $i <= $pageTotal; $i++): ?>
            $('#page-<?php echo $i; ?>').click(function() {
                var pageNumber = <?php echo $i; ?>;
                $.ajax({
                    url: '<?php echo _WEB_ROOT; ?>/admin/user/pagination',
                    method: 'GET',
                    data: {pageNumber:pageNumber},
                    success: function(data) {
                        $('#dataPage').html(data);
                    }
                })
            })
            <?php endfor; ?>

            $("#search").keyup(function() {
                let keyword = $("#search").val();
                $.ajax({
                    url: "<?php echo _WEB_ROOT; ?>/admin/user/findUser",
                    method: "GET",
                    data: {keyword:keyword},
                    success: function(data) {
                        $("#dataPage").html(data);
                }
                })
            })
        })
    </script>
    

    