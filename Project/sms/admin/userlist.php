
   
<?php 

	include('header.php');
?>



<!--End Menu -->
<div class="right_area">
<div class="top_right_txt">
<span class="purple">Welcome <?php echo $row['a_name']?>.  Profile ID:<?php echo $row['a_id']?></span><br>
</div>
	
<div class="clear"></div>
<!--Start Upper Menu -->
<!--End Upper Menu -->
<div class="right_main_box margintop">
<div class="headng">
<div class="fleft">Client List</div><!--<div class="fright">&nbsp;<a href="#" class="text" style="text-decoration:none"><b>Active</b><font color="blue"><b>&nbsp;[0]</b></font></a> | <a href="#" class="text" style="text-decoration:none">Inactive</a> | <a href="#" class="text" style="text-decoration:none"><font color="#8f0000">Reseller</font></a> | <a href="#" class="text" style="text-decoration:none"><font color="green">Seller</font></a> | <a href="#" class="text" style="text-decoration:none">Client</a> | <a href="#" class="text" style="text-decoration:none"><font color="#FF0000">Deleted</font></a>| <a href="#" class="text" style="text-decoration:none"><font color="#FF6600">Expired</font></a></div>-->
<div class="clear"></div>
</div>
<div class="text_area">
<div class="sorting_div">

<div class="clear"></div>
</div>
<!--Start List -->

<form name="frmrpt" id="frmrpt" method="post" action="">
<input type="hidden" name="senderid" value="">
<input type="hidden" name="cpgno" value="1">
<div class="heading_row">
<div class="table_column" style="width:70px;">
<input type="checkbox" name="select_all"   onclick="toggle(this);" / >
</div>
<div class="table_column" style="width:70px;">
<a href="#" style="text-decoration:none; color:#FFFFFF" title="Sort Descending">Sr. No. </a>
</div>

<div class="table_column" style="width:70px;">
<a href="#" style="text-decoration:none; color:#FFFFFF" title="Sort Ascending">User </a>
</div>	
		
	<div class="table_column" style="width:170px;">Email</div>
<div class="table_column" style="width:100px;">Mobile</div>
<div class="table_column" style="width:70px;">Voice Cr</div>
<div class="table_column" style="width:70px; text-align:right">Sms Cr</div>
<div class="table_column" style="width:40px; text-align:right">Expiry Date</div>
<div class="clear"></div>
</div>
		<div class="white_row">
		<table id="example1" class="table_column" style="width:540px;">
		 
		 <tbody>
			<?php
					include("inc/db.php");
	
	
	 include("pagination/function.php");
                                             $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                                                	$limit =5; //if you want to dispaly 10 records per page then you have to change here
                                                	$startpoint = ($page * $limit) - $limit;
                                                    $statement = "profile order by sa_id DESC"; //you have to pass your query over here
                                            
                                            	
                                            		 $res=$con->prepare("select * from {$statement} LIMIT {$startpoint} , {$limit}");
                                                        $res->setFetchMode(PDO::FETCH_ASSOC);
                                                        $res->execute();
	
			
					$i=1;
					while($row=$res->fetch()) :
						
						echo "
						<tr>
						<td>  <input type='checkbox' name='check_list[]' value='".$row['sa_id']."'></td>
						<td style='max-width:20px;padding-left:70px'><p id='hide_name1'>".$i++."</p></td>
                        <td style='max-width:50px;padding-left:65px'><p id='hide_name1'>".$row['sa_user']."</p></td>
						<td style='max-width:150px;padding-left:33px'><p id='hide_name1'>".$row['sa_email']."</p></td>
                        
                        <td style='max-width:180px;padding-left:68px'><p id='hide_name1'>".$row['mobile']."</p></td>
						
						
			 <td style='max-width:100px;padding-left:70px'><p id='hide_name1'>".$row['voice_credit']."</p></td>
	<td style='max-width:100px;padding-left:100px'><p id='hide_name1'>".$row['sms_credit']."</p></td>
	 <td style='max-width:100px;padding-left:40px'><p id='hide_name1'>".$row['expiry_after']."</p></td>";
	
				echo"	
                      </tr>
						";
					endwhile;	?>
								
									
			</tbody>
			
			</table>
		</div>
		<div class="clear"></div>
		
			<div class="row "  style="padding-left:500px;">
									    <?php
                                            echo "<div id='pagingg' >";
                                            echo "<ul class='pags' type='none'><li>";
                                            echo pagination($statement,$limit,$page);
                                            echo "</li></ul>";
                                            echo "</div>";
                                            ?>
                                        </div>
			
		</div>
		
		<div class="margintop">&nbsp;</div>
<div class="sorting_div">
<input name="cmddelete" id="cmddelete" type="submit" class="small_grey_btn marginright" value="Delete Selected Schedule" onclick="return confirmDelete();">&nbsp;

</div>



<?php
	
	
	
	
		if(isset($_POST['cmddelete'])){
			$delete=$_POST['check_list'];
			
   foreach ($delete as $id){
   $sql = $con->prepare("DELETE FROM profile WHERE sa_id='$id'");
	   
	   $sql->execute();
   //Here you are missing below statement
	
	}
		if($sql){
			
			echo"<meta http-equiv=\"refresh\" content=\"0; URL= userlist.php\">";
		}
			
		}
	
	?>
	
	
		<script>
	function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
	</script>	
	
	</form>

<!--End List -->
</div>
<div class="clear"></div>
</div><!--End Right Main Box-->
</div><!--END RIGHT AREA -->
<div class="clear"></div>
</div>

<SCRIPT language="javascript">
$(function(){

	// add multiple select / deselect functionality
	$("#select_all").click(function () {
		  $('.check_list').attr('checked', this.checked);
	});

	// if all checkbox are selected, check the selectall checkbox
	// and viceversa
	$(".check_list").click(function(){

		if($(".check_list").length == $(".check_list:checked").length) {
			$("#select_all").attr("checked", "checked");
		} else {
			$("#select_all").removeAttr("checked");
		}

	});
});
</SCRIPT>



<script>
function confirmDelete()
{
result = confirm("This action will delete selected scheduled requests. Do you wish to continue?");
if(result =="1" )
  { 
	return true;
  }
else
  {
	return false;
  }  
}

function confirmDeleteAll()
{
result = confirm("This action will delete your all scheduled requests. Do you wish to continue?");
if(result =="1" )
  { 
	return true;
  }
else
  {
	return false;
  }  
}	  
</script>


<script type="text/javascript" language="javascript">
document.getElementById('totbal').innerHTML=0;
</script>


   
<?php 

	include('footer.php');
?>