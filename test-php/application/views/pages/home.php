
        <div class="col-12">
            <div class="title">
                <h5>Kết quả chi tiết</h5>
            </div>
            <table class="table table-sm table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Receiver</th>
                    <th scope="col">Nhà mạng</th>
                    <th scope="col">Keyword</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Mệnh giá</th>
                    <th scope="col">Thời gian</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($result as $item) : ?>
                <tr>
                    <th scope="row"><?= $item->id ?></th>
                    <td><?= $item->receiver ?></td>
                    <td><?= $item->operator ?></td>
                    <td><?= $item->keyword ?></td>
                    <td><?= $item->msgdata ?></td>
                    <td><?= $item->money ?></td>
                    <td><?= $item->loggingTime ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

