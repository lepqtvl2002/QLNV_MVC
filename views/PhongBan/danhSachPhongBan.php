<div class="container">
    <form action="" method="post">       
        <input type="text" name="information" placeholder="Tìm phòng ban">
        <button type="submit" name="search_pb">Tìm kiếm</button>
    </form>
    <h1 id="title">Danh sách phòng ban</h1>
    <table style="width:100%;">
        <thead style="text-align:left;">
            <tr>
                <th>Idpb</th>
                <th>Tên phòng ban</th>
                <th>Mô tả</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $key => $arr) {
                echo "<tr>";
                foreach ($arr as $key => $value) {
                    echo "<td>$value</td>";
                }
                
                if ($_SESSION['adminId']) echo "<td>
                <button class='btn btn-warning' onclick=\"navigate('PhongBan', 'Detail', {$arr['idpb']})\">Detail</button>
                <button class='btn btn-success' onclick=\"navigate('PhongBan', 'Edit', {$arr['idpb']})\">Edit</button>
                <button class='btn btn-danger' onclick=\"navigate('PhongBan', 'Delete', {$arr['idpb']})\">Delete</button>
                </td>";

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <hr/>
    <a class="btn btn-outline-primary" href="./">Back</a>
</div>