
<p><label style="font-size:14px">Patient ID :</label><label  style="font-size:20px;font-weight:bold"><?php echo $id;?></label></p>


<p></p>
<?php 

$query = $this->db->get_where('examinationx24', array('searchID' => $id));
?>

<p></p>
<table bordercolor="#CCCCFF" border="1" >

<tr>
<td align="center"><label style="font-size:22px; font-weight:bold; font-stretch:narrower">Previous Entries</label></td>
<td align="center">
<label style="font-size:22px; font-weight:bold; font-stretch:narrower">Date</label>
</td>
</tr>

<?php

foreach ($query->result() as $row) {?>
<tr>
<td >
<form method="post" action="<?php echo $base_url;?>bmpt/show_diagnosis">
	  <label style="font-size:15px;font-weight:bold"><?php echo "Examination ID :".$row->examinationID;?></label>
       <input type='hidden' id='exam_id' name='exam_id' value=<?php echo $row->examinationID;?> />
      <input type='hidden' name="pid" value=<?php echo $id?> />
      <input type='submit' value='Click' />
</form>
  </td>
  <td >
  <?php echo $row->date;?>
  </td>

</tr>
<?php
}
?>

</table>
