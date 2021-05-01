<?php require('header.php') ?>
 
<!-- HEADER: MENU + HEROE SECTION -->
 

<!-- CONTENT -->

<section>
	 
	<button class="buttonExcel" id="ButtonExcel" style="margin-bottom: 10px" onclick="getExcel()" >Excel<i class="fa fa-file-excel-o"></i></button>

    <table class="table table-bordered" id="users-list">
       <thead>
          <tr>
             <th>Id</th>
             <th>Name</th>
             <th>Email</th>
          </tr>
       </thead>
       <tbody>
          <?php if($users): ?>
          <?php foreach($users as $user): ?>
          <tr>
             <td><?php echo $user['id']; ?></td>
             <td><?php echo $user['name']; ?></td>
             <td><?php echo $user['email']; ?></td>
          </tr>
         <?php endforeach; ?>
         <?php endif; ?>
       </tbody>
     </table>

	 
</section>

 
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    function getExcel(){
    	alert("<?php echo base_url()?>");
    	$.ajax({
            url:'<?=base_url();?>/export_data',
            destroy: true,
            type: 'POST',
            data: '',
            success: function(response){
                window.open('<?=base_url();?>/Exportexcel/export_data','_blank');
            },
            error: function(){
                alert("error when get data");
            }
        });

 	}
 </script>