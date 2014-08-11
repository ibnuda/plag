<?php

session_start();

?>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-4 column">
                    <form action="./php/bandingkan.php">
                        <button class="btn center-block" type="submit">Banding</button>
                    </form>
                </div>
                <div class="col-md-4 column">
                    <form action="./php/rekap.php">
                        <button class="btn center-block" type="submit">Rekap</button>
                    </form>
                </div>
                <div class="col-md-4 column">
                    <form action="./php/logout.php">
                        <button class="btn center-block" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <h1 class="text-center">INI BANDING</h1>
        </div>
    </div>
</div>
