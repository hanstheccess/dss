<div class="panel-body">
    <div class="table-responsive">
        <table id="herotable00" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Alt</th>
                    <th class="text-center">Rank TOPSIS</th>
                    <th class="text-center">Poin Borda TOPSIS</th>
                    <th class="text-center">Rank PROMETHEE</th>
                    <th class="text-center">Poin Borda PROMETHEE</th>
                    <th class="text-center">Total Poin Borda</th>
                    <th class="text-center">Rank Borda</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($i=1; $i <= $countalt; $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>".$i."</td>";
                        echo "<td class='text-center'>A".$i."</td>";
                        for ($j=1; $j <= $countmetode; $j++) {
                            $r = $rank[$i][$j];
                            $p = $poin;
                            $b = $p-$r;
                            echo "<td class='text-center'>".$rank[$i][$j]."</td>";
                            echo "<td class='text-center'>".$b."</td>";
                        }
                        echo "<td class='text-center'>".$poinborda[$i]."</td>";
                        echo "<td class='text-center'>".$rankborda[$i]."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div></div></div></div></section>