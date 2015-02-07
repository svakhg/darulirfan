<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echomd5(3);
?>
<script>
    ajax_paging = function()
    {
        $("p.pagination a").click(function()
        {
            $.ajax({
                type: "GET",
                url: $(this).get(),
                success: function(html)
                {
                    $("#display-content").html(html);
                }
            });
        });
        return false;
    };
</script>

<?php
if ($num_results == 0) {
    echo 'No data result, please insert one';
} else {
    ?>
    <div id="display-content">
        <table width="100%">
            <tr>
                <th>CP code</th>
                <th>Code</th>
            </tr>
            <?php foreach ($records as $row) { ?>
                <tr>
                    <td align="center"><?php echo $row->created_date ?></td>
                    <td align="center"><?php echo $row->uid ?></td>
                </tr>
            <?php } ?>
        </table>
        <p class="pagination">
            <?= $pagination ?>
        </p>
    </div>
<?php } ?>
<p class="pagination">
    &nbsp;<strong>1</strong>&nbsp;
    <a onclick="javascript:ajax_paging();
            return true;" href="http://bravonet.my/tombocrm/inside/home_fpr/5">2</a>&nbsp;
    <a onclick="javascript:ajax_paging();
            return true;" href="http://bravonet.my/tombocrm/inside/home_fpr/10">3</a>&nbsp;
    <a onclick="javascript:ajax_paging();
            return true;" href="http://bravonet.my/tombocrm/inside/home_fpr/5">&gt;</a>&nbsp;    
</p>

<?PHP
//recursive function
//#include<stdio.h>
//#include<conio.h>
//int rep(int);
//void main() {
//    int x;
//    scanf("%d", &x);
//    printf("%d", rep(x));
//    getch();
//}
//int rep(int n) {
//    if (n == 0) {
//        return 1;
//    } else {
//        int p = n * rep(n - 1);
//        return p;
//    }
//}
?>