<div class="panel-body">
    <div class="row text-center">
        <div class="col-md-12">
            <h4>T00 - Data Awal</h4>
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
            <h4>T01 - Normalisasi</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable01" class="cell-border" style="width:100%">
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
                    for ($i=1; $i <= count($T01); $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>A".$i."</td>";
                        for ($j=1; $j <= $countkrt; $j++) { 
                            echo "<td class='text-center'>".$T01[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <h4>T02 - Normalisasi Terbobot</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable02" class="cell-border" style="width:100%">
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
                    for ($i=1; $i <= count($T02); $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>A".$i."</td>";
                        for ($j=1; $j <= $countkrt; $j++) { 
                            echo "<td class='text-center'>".$T02[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <h4>T03 - Solusi Ideal Positif & Solusi Ideal Negatif</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable03" class="cell-border" style="width:100%">
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
                    for ($i=1; $i <= count($T03); $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>".$si[$i]."</td>";
                        for ($j=1; $j <= $countkrt; $j++) { 
                            echo "<td class='text-center'>".$T03[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <h4>T04 - Jarak Alternatif ke Solusi Ideal Positif</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable04" class="cell-border" style="width:100%">
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
                    for ($i=1; $i <= count($T04JKP); $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>A".$i."</td>";
                        for ($j=1; $j <= $countkrt; $j++) { 
                            echo "<td class='text-center'>".$T04JKP[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <h4>T04 - Jarak Alternatif ke Solusi Ideal Negatif</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable05" class="cell-border" style="width:100%">
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
                    for ($i=1; $i <= count($T04JKN); $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>A".$i."</td>";
                        for ($j=1; $j <= $countkrt; $j++) { 
                            echo "<td class='text-center'>".$T04JKN[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <h4>T05 - Jarak Solusi Ideal Positif</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable06" class="cell-border" style="width:100%">
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
                    for ($i=1; $i <= count($T05); $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>".$si[$i]."</td>";
                        for ($j=1; $j <= $countalt; $j++) { 
                            echo "<td class='text-center'>".$T05[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        <div class="col-md-12">
            <h4>T06 - Nilai Preferensi</h4>
        </div>
    </div>
    <div class="table-responsive">
        <table id="herotable07" class="cell-border" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">/</th>
                    <th class="text-center">Nilai Preferensi</th>
                    <th class="text-center">Ranking</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    for ($i=1; $i <= count($T06); $i++) { 
                        echo "<tr>";
                        echo "<td class='text-center'>A".$i."</td>";
                        echo "<td class='text-center'>".$T06[$i]."</td>";
                        echo "<td class='text-center'>".$rank[$i]."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div></div></div></div></section>