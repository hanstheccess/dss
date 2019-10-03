<?php
$alt = 1;
$krt = 1;
$id = 1;
foreach ($query->result() as $row) {
    $print[$id][0] = $row->id_alt;
    $print[$id][$krt] = $row->nilai;
    $krt++;
    if ($krt>$countkrt) {
        $alt++;
        $id++;
        $krt = 1;
    }   
}
?>
<div class="panel-body">
    <div class="table-responsive">
        <table id="herotable00" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">/</th>
                    <?php
                        for ($i=1; $i <=$countkrt; $i++) { 
                            echo "<th class='text-center'>K".$i."</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($i=1; $i <= count($print); $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>A".$i."</td>";
                        for ($j=1; $j <= $countkrt; $j++) { 
                            echo "<td class='text-center'>".$print[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>  
</div>
</div></div></div></div></section>