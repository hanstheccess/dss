<div class="panel-body">
    <div class="row text-center">
        <div class="col-md-12">
            <h4>P00 - Data Awal</h4>
        </div>
    </div>
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
    <div class="row text-center">
        <div class="col-md-12">
            <h4>P01 - Perbandingan Berpasangan</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable01" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">/</th>
                    <?php
                        for ($i=1; $i <=$countalt; $i++) { 
                            for ($j=1; $j <=$countalt ; $j++) { 
                                if ($i!=$j) {
                                    echo "<th class='text-center'>A".$i."<br>A".$j."</th>";
                                }
                            }
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($i=1; $i <= $countkrt; $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>K".$i."</td>";
                        for ($j=1; $j <=$countalt; $j++) { 
                            for ($k=1; $k <=$countalt ; $k++) { 
                                if ($j!=$k) {
                                    echo "<td class='text-center'>".$P01[$i][$j][$k]."</td>";
                                }
                            }
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <h4>P02 - Preferensi</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable02" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">/</th>
                    <?php
                        for ($i=1; $i <=$countalt; $i++) { 
                            for ($j=1; $j <=$countalt ; $j++) { 
                                if ($i!=$j) {
                                    echo "<th class='text-center'>A".$i."<br>A".$j."</th>";
                                }
                            }
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($i=1; $i <= $countkrt; $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>K".$i."</td>";
                        for ($j=1; $j <=$countalt; $j++) { 
                            for ($k=1; $k <=$countalt ; $k++) { 
                                if ($j!=$k) {
                                    echo "<td class='text-center'>".$P02[$i][$j][$k]."</td>";
                                }
                            }
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <h4>P03 - Indeks Preferensi</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable03" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">/</th>
                    <?php
                        for ($i=1; $i <=$countalt; $i++) { 
                            for ($j=1; $j <=$countalt ; $j++) { 
                                if ($i!=$j) {
                                    echo "<th class='text-center'>A".$i."<br>A".$j."</th>";
                                }
                            }
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($i=1; $i <= $countkrt; $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>K".$i."</td>";
                        for ($j=1; $j <=$countalt; $j++) { 
                            for ($k=1; $k <=$countalt ; $k++) { 
                                if ($j!=$k) {
                                    echo "<td class='text-center'>".$P03[$i][$j][$k]."</td>";
                                }
                            }
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>      
    <div class="row text-center">
        <div class="col-md-12">
            <h4>P04 - Matriks Indeks Preferensi</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable04" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">/</th>
                    <?php
                        for ($i=1; $i <=$countalt; $i++) { 
                            echo "<th class='text-center'>A".$i."</th>";
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($i=1; $i <= $countalt; $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>K".$i."</td>";
                        for ($j=1; $j <=$countalt; $j++) { 
                            echo "<td class='text-center'>".$P04[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <h4>P05 - Hasil Akhir</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable05" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Alt</th>
                    <th class="text-center">Leaving Flow</th>
                    <th class="text-center">Entering Flow</th>
                    <th class="text-center">Net Flow</th>
                    <th class="text-center">Rank</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    for ($i=1; $i <= $countalt; $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>".$no."</td>";
                        echo "<td class='text-center'>A".$i."</td>";
                        for ($j=1; $j <=3; $j++) {
                            echo "<td class='text-center'>".$P05[$i][$j]."</td>";
                        }
                        echo "<td class='text-center'>".$rank[$i]."</td>";
                        echo "</tr>";
                        $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>                  
</div>
</div></div></div></div></section>