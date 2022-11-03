<div class="container">
    <table style="width:100%;">
        <thead style="text-align:left;">
            <tr>
                <th>Id</th>
                <th>Họ tên</th>
                <th>Địa chỉ</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            echo "<h2>{$data['tenpb']}</h2>",
            "<h5>{$data['mota']}</h5>";
            foreach ($data['nhanviens'] as $index => $nhanvien) {
                echo "<tr>";
                foreach ($nhanvien as $key => $value) {
                    echo "<td>{$value}</td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
    
<a class="btn btn-outline-primary" href="../">Back</a>