<div class="col-12">
    <form action="<?= site_url('pages/getData') ?>" method="get">
        <input type="hidden" name="filter" value="true">
        <input type="hidden" name="filter_by" value="1">
        <div class="form-group">
            <div class="list-group">
                <div class="col-4">
                    <div class="input-group input-group-sm mb-3 date">
                        <input type="text" name="since" id="datepicker" class="form-control mr-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        <input type="text" name="todate" id="datepicker2" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
                <label for="exampleFormControlSelect1">Tim theo nha mang</label>
                <select class="form-control" name="operator">
                    <option>Viettel</option>
                    <option>Vinaphone</option>
                    <option>Mobifone</option>
                </select>
                <label for="exampleFormControlSelect1">Tim theo menh gia</label>
                <select class="form-control" name="money">
                    <option>20000</option>
                    <option>50000</option>
                    <option>100000</option>
                    <option>200000</option>
                    <option>500000</option>
                </select>
                <label for="exampleInputEmail1">User ID</label>
                <input type="text" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <label for="exampleInputEmail1">Phone</label>
                <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                <div class="row">
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary" >Chon</button>
                        <button type="button" class="btn btn-primary">Thoat</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

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
        <div class="col-md-4 offset-8">
            <?= $pagination ?>
        </div>

