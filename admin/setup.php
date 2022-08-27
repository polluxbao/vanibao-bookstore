<?php
include_once "header.php";
?>

    <!--management-->

    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><a href="index.php">&#9750; Main</a><span class="crumb-step">&gt;</span><span class="crumb-name">System Setup</span></div>
        </div>

        <div class="result-wrap">
            <div class="result-title">
                <h4>Administrator</h4>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <label class="res-lab labelblock">
                        Password&nbsp;
                        <input type="text" id="setpasswd"/>
                     </label>
                     <label class="res-lab labelblock">
                        Re-input Password&nbsp;
                        <input type="text" id="setpasswd2"/>
                     </label>
                </ul>
                <br>
                <input type="submit" value="Submit" />
                <input type="reset" value="Reset" />

            </div>


            <br>
            <div class="result-title">
                <h4>Website</h4>
            </div>
            <div class="result-content">
                <ul class="sys-info-list">
                    <label class="res-lab labelblock">
                        Title&nbsp;
                        <input type="text" id="settitle"/>
                     </label>
                     <label class="res-lab labelblock">
                        Keywords&nbsp;
                        <input type="text" id="setkeyword"/>
                     </label>
                     <label class="res-lab labelblock">
                        Description&nbsp;
                        <input type="text" id="setdesc"/>
                     </label>
                     <label class="res-lab labelblock">
                        Web status&nbsp;
                        <label class="Optionlabel">
                            On
                             <input type="radio" id="webopen" name="webopen" value="Open" />
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Off
                            <input type="radio" id="webclose" name="webclose" value="Close" />
                        </label>                     
                    </label>
                </ul>
                <br>
                <input type="submit" value="Submit" />
                <input type="reset" value="Reset" />
            </div>

    </div>
</div>


</body>
</html>