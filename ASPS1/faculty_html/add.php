<?php
	$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);
?>
<?php include 'header.php'; ?>





<script src="js/bootstrap.min.js"></script>
		<script src="jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				 $("#getUID").load("UIDContainer.php");
				setInterval(function() {
					$("#getUID").load("UIDContainer.php");
				}, 500);
			});
	    </script>







<div id="main-content">
    <h2>Add New Request</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Student Reg.No</label>
            <input name="id" id="getUID" placeholder="Please Scan your Card / Key Chain to display ID" rows="1" cols="1" required />
        </div>



        <div class="control-group">
			<label class="control-label"><font color="white">ID</label>
				<div class="controls">
					<textarea name="id" id="getUI" placeholder="Please Scan your Card / Key Chain to display ID" rows="1" cols="1" required></textarea>
				</div>
		</div>




        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Year</label>
            <select name="class">
                <option value="" selected disabled>Select Year</option>
                <option value="1">I</option>
                <option value="2">II</option>
                <option value="3">III</option>
                <option value="3">IV</option>
            </select>
        </div>
        <div class="form-group">
            <label>Section</label>
            <select name="class">
                <option value="" selected disabled>Select Section</option>
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
            </select>
        </div>
        <div class="form-group">
            <label>Reason</label>
            <input type="textarea" name="sreason" />
        </div>


        <!-- <div class="form-group">
            <label for="time">Select a time:</label>
            <input type="time" id="time" name="time">
        </div> -->


        <input class="submit" type="submit" value="Save"  />
    </form>
</div>
</div>
</body>
</html>
