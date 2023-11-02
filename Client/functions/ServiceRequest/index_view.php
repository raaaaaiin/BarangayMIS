<!DOCTYPE html>
<html class="no-js" lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style> .info {
        color: rgba(29, 33, 36, 0.76);
        background-color: #e7f3fe;
        border-left: 6px solid #2196F3;
    }
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: inherit;
        }
        html {
            box-sizing: border-box;
            font-size: 62.5%;
        }
        body {
            display: flex;
            justify-content: center;
            align-content: center;
            padding: 6rem;
            background-color:#f9fafe !important
            font-family: "Inter", sans-serif;
        }
        @media (max-width: 60em) {
            body {
                padding: 3rem;
            }
        }
        .grid {
            display: grid;
            width: 114rem;
            grid-gap: 6rem;
            grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
            align-items: start;
        }
        @media (max-width: 60em) {
            .grid {
                grid-gap: 3rem;
            }
        }
        .grid__item {
            height:100%;
            background-color: #fff;
            border-radius: 0.4rem;
            overflow: hidden;
            box-shadow: 0 3rem 6rem rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: 0.2s;
        }
        .grid__item:hover {
            transform: translateY(-0.5%);
            box-shadow: 0 4rem 8rem rgba(0, 0, 0, 0.2);
        }
        .card__img {
            display: block;
            width: 100%;
            height: 18rem;
            object-fit: cover;
        }
        .card__content {
            padding: 3rem 3rem;
        }
        .card__header {
            font-size: 3rem;
            font-weight: 500;
            color: #0d0d0d;
            margin-bottom: 1.5rem;
        }
        .card__text {
            font-size: 1.5rem;
            letter-spacing: 0.1rem;
            line-height: 1.7;
            color: #3d3d3d;
            margin-bottom: 2.5rem;
        }
        .card__btn {
            display: block;
            width: 100%;
            padding: 1.5rem;
            font-size: 1.5rem;
            text-align: center;
            color: #3363ff;
            background-color: #e6ecff;
            border: none;
            border-radius: 0.4rem;
            transition: 0.2s;
            cursor: pointer;
        }
        .card__btn span {
            margin-left: 1rem;
            transition: 0.2s;
        }
        .card__btn:hover, .card__btn:active {
            background-color: #dce4ff;
        }
        .card__btn:hover span, .card__btn:active span {
            margin-left: 1.5rem;
        }
        .mdl-overlay{
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }

        .mdl-content{

            background-color: #f4f4f4;
            margin: 5% auto;
            width: 50%;
            box-shadow: 0 5px 8px 0 rgba(0,0,0,0.2),0 7px 20px 0 rgba(0,0,0,0.17);
        }
        @media (max-width: 700px) {
    .mdl-content {
        width: 100%;
        margin: 5% auto;
        box-shadow: none;
    }
}
        .mdl-header h2, .mdl-footer h3{
            margin: 0;
        }

        .mdl-header{
            background: #14aa6c;
            padding: 15px;
            color: #fff;
        }

        .mdl-body{
            padding: 10px 20px;
        }

        .mdl-footer{
            background: #ffffff;
            padding: 10px;
            color: #fff;
            text-align: center;
        }.closeBtn{
             font-size: 30px;
             color: #fff;
             float: right;
         }

        .closeBtn:hover,.closeBtn:focus{
            color: #ef3939;
            text-decoration: none;
            cursor:  pointer;
        }
        .kyotie{
            width: 300px;
            background-color: #fff;
            border: 2px solid #eaeaea;
            border-radius: 3px;
            padding: 0 14px 1px;
            height: 48px;
            font-size: 16px;
            -webkit-appearance: none;
        }
        .button--purple {
            color: #fff;
            background: #14aa6c;
            transition: all .5s ease;
            box-shadow: 0 4px 6px rgb(50 50 93 / 11%), 0 1px 3px rgb(0 0 0 / 8%);
        }
        .btn__large {
            outline: 0;
            position: relative;
            font-size: 18px;
            padding: 15px 35px 15px;
            display: inline-block;
            border: none;
            cursor: pointer;
            font-weight: 700;
        }
    </style>
</head>
<body style="background-color:#f9fafe !important">
<div id="simpleModal" class="mdl-overlay">
    <div class="mdl-content">
        <div class="mdl-header">
            <span class="closeBtn" onclick="Modalhide()">✖</span>
            <h2 style="color:white">Appointment approval</h2>
        </div><form style="margin:25px"  onsubmit="setdate(); return false;">
        <center><div style="display:flex;flex-direction: column;align-content: space-between;align-items: center;height:100%;width:75%;margin:0px">


                    <div style="width:75%;display:flex;justify-content: space-between;align-items: center;"><span style="font-size:2em">Time:</span><input id="timepick" class="kyotie" name="timepick" type="time" value="" required>

<script>
document.getElementById("timepick").addEventListener("change", function() {
  var time = this.value;
  var minTime = "09:00";
  var maxTime = "17:00";
  
  if (time < minTime || time > maxTime) {
    alert("Please select a time between 9 AM and 5 PM");
    this.value = "";
  }
});
</script></div>
                    <div style="width:75%;display:flex;justify-content: space-between;align-items: center;"><span style="font-size:2em">Date:</span><input id="datepick" class="kyotie" name="datepick" type="date" value="" required onchange="disableSunday(this)">

<script>
function disableSunday(element) {
  var date = new Date(element.value);
  if (date.getDay() === 0) {
    alert("Sunday is disabled");
    element.value = "";
  }
}
</script></div>
                    <div style="width:75%;display:flex;justify-content: space-between;align-items: center;"><span style="font-size:2em">Purpose:</span><input id="purposepick" class="kyotie" name="purposepick" value="" required></div>


            <input id="purposecert" name="" value="" hidden><br>


            <input type="submit" name="submitter" class="button app btn__large button--purple" value="Confirm" >

        </div></center>
        </form>
        <div class="mdl-footer"><span style="color:gray;float:right;">San Isidro MIS</span><br>



        </div>
    </div>
</div>
<div class="grid">
    <?php

    foreach($this->certs as $papers){
        ?>



        <div class="grid__item">
            <div class="card"><img class="card__img" src="<?php echo $papers[2] ?>" alt="Snowy Mountains">
                <div class="card__content">
                    <h1 class="card__header"><?php echo $papers[1] ?></h1>
                    <p class="card__text"><?php echo $papers[3] ?></p>
                    <button class="card__btn"><?php echo $papers[0] ?> <?php echo $papers[1] ?></button>
                </div>
            </div>
        </div>





        <?php
    }
    ?>



</div>
</body>
</html>