<!DOCTYPE html>
<html ><!--<![endif]-->
<head>


<?php $this->load->view('includes/head'); ?> 


</head>

                 

<body >


   <table id="prescriptionTable" >
        <tr>
          
          <td colspan="4">
           <div align="center" style="background:#CCF" >
     <label class="b" style="font-size:20px;font-weight:bold;color:#036">Prescription Panel</label>
    </div>
          </td>
        </tr>
        <tr>
       
		<td colspan="4">		   <div align="center"><input type="button" id="editMed" value="Edit Medicine" class="link_button_b "/></div>
		  </td>
        </tr>
        <tr>
          <td colspan="3">
          
           
          
          
          <label class="b" style="font-size:16px;font-weight:bold;color:#036">&nbsp;Search Medicine by Medicine Name</label><br/>
          <div id="com_1"> </div> 
          
          
          </td>
          </tr>
        <tr>
		<td width="20%">
        
          <div id="dose"> 
         
         
         </div>
           <div id="editDose" align="center" style="display:none; border-radius:5px;background-color:#99C">
          <p>&nbsp;</p>
		    <input type="text" id="newDose"/><br/>
		    
		    <input type="button" id="addDose" value="Add Dose" class="link_button_a "/>
            <input type="button" id="deleteDose" value="Delete Dose" class="link_button_a "/>
           
		    <p>&nbsp;</p>
		    </div>
         
        
            
            <div align="center"> 
         <label class="b" style="font-size:16px;font-weight:bold;color:#036">Day(s)</label><br/>
        
         <input type="text" id="days"/><br/>
         <input type="button" id="addDays" value="Add to Prescription" class="link_button_a "/><br/>
         <input type="button" id="beforeMeal" value="খাওয়ার আগে" class="link_button_a "/><br/>
         <input type="button" id="afterMeal" value="খাওয়ার পরে" class="link_button_a "/>
         </div>
		  		  </td>
        <td width="20%">
        <div align="center">
        <label class="b" style="font-size:16px;font-weight:bold;color:#036">Test Type</label><br/>
       
        
            <input type="text" id="testType" />
           
            <input type="button" id="showTest" value="Show Test" class="link_button_a "/>
     
            
         </div>
        <div id="list4">
   <ul id="sortable1">
      <li title="ABCD" ><a id='aba' href="#" class"asdf"><strong>Beijing</strong>2008</li>
      <li><a id='aba' href="#" class"asdf"><strong>Beijing</strong>2008</a></li>
      <li><a href="#" class"asdf"><strong>London</strong>2012</a></li>
      <li><a href="#" class"asdf"><strong>Rio de Janeiro</strong>2016</a></li>
   </ul>
</div>
         <div id="testDiv"> 
         
         
         </div>
         
         
         
         
         
        
         	</td>
        <td colspan="3" width="60%">
        <label class="b" style="font-size:16px;font-weight:bold;color:#036">Search Prescription</label><br/>
         <input type="text" id="disease"/> <input type="button" id="getPresc" value="Get Prescription" class="link_button_b"/> 
        
         <div id="editPrescrip" align="left" style="display:none; border-radius:5px;background-color:#99C">
         <p>&nbsp;</p>
         &nbsp;<input type="button" id="addPrescrip" value="Save Prescription" class="link_button_b"/>
         <input type="button" id="upPrescrip" value="Update Prescription" class="link_button_b"/>
         <p>&nbsp;</p>
         </div>
         <p>&nbsp;</p>
         <textarea id="prescription" name="prescription" class="element diagnosis medium" value="ABCD" ></textarea><br/>
         <input type="button" id="prPrescrip" value="Add to Primary Diagnosis" class="link_button_b"/>
         <input type="button" id="finalprescrip" value="Add to Final Diagnosis" class="link_button_b"/>
        </td>
        </tr>
   
    
        
        </table>
    


</body>
</html>