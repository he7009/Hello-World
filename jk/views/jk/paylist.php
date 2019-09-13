<table>
    <tr>
        <td>交易时间</td>
        <td>交易订单号</td>
        <td>交易金额(单位：分)</td>
    </tr>
    <?php foreach ($paylist as $val):?>
    <tr>
        <td><?php echo $val['txtime'];?></td>
        <td><?php echo $val['inetno'];?></td>
        <td><?php echo $val['payamount'];?></td>
    </tr>
    <?php endforeach;?>
</table>