<?php $title = $customerName. ' - Quote #'. $quote['id'] ?>

<?php ob_start() ?>

    <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="#">
    <h1><?php echo 'Quote#: '.$quote['id'] ?></h1>
    <?php echo $alerts ?>
    	
    	
    	
    	<div class="ui-dialog-button-set">
	    	<button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false">
	    	  <span class="ui-button-text"><a href="show.php?id=<?php echo $quote['id'] ?>&action=preview">Preview</a></span>
	    	</button>
	    	<button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false">
	    	  <span class="ui-button-text"><a href="#">Edit</a></span>
	    	</button>
	    	<button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false">
	    	  <span class="ui-button-text"><a href="newquote.php?action=copy&id=<?php echo $quote['id'] ?>">Clone Quote</a></span>
	    	</button>
	    	<button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false">
	    	  <span class="ui-button-text">Upload File(s)</span>
	    	</button>
	    	<button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false">
	    	  <span class="ui-button-text"><a href="javascript:window.alert('<?php echo $contact[0] ?> from <?php echo $customerName ?> would have been emailed successfully.\n However, this is a test.');" class="confirm" title="Are you sure you want to email the quote?">Email Quote</a></span>
	    	</button>
	    	<?php if ($quote['job_id'] == 0){ ?>
	    	<button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false">
	    	  <span class="ui-button-text"><a href="job.php?action=create&quoteid=<?php echo $quote['id']?>">Convert to Job</a></span>
	    	</button>
        </div>
     <br/>	
    <p>This quote <strong>does not</strong> link to a job.</p>
    <?php }else{ ?>
     </div><p><strong><a href="job.php?id=<?php echo $quote['job_id']?>">Job #: 
    <?php echo $quote['job_id'] ?>
    </a></strong> is based off of this quote.</p>
    <?php } ?>
    
    <table>
    	<tr>
    	 <td>Foundry<br/><small class="small"><a href="#">View customer</a></small></td>
    	 <td><input type="text" disabled value="<?php echo $customerName ?>" /></td>
    	 <td>Date Issued</td>
    	 <td><input type="text" disabled value="<?php echo $quote['dateIssued'] ?>" /></td>
    	</tr>
    	
    	<tr>
    	 <td>Customer Contact</td>
    	 <td><input type="text" disabled value="<?php echo $contact[0]. ' (' .$contact[1]. ')' ?>" /></td>
    	 <td>Pattern Number</td>
    	 <td><input type="text" disabled value="<?php echo $quote['patternNumber'] ?>" /></td>
    	</tr>
    	
    	<tr>
    	 <td>Est. Delivery</td>
    	 <td><input type="text" disabled value="<?php echo $quote['estimatedDelivery'] ?>" /></td>
    	 <td>Pattern Owner</td>
    	 <td><input type="text" disabled value="<?php echo $quote['patternOwner'] ?>" /></td>
    	</tr>
    </table>
    
    <div class="spacer"></div>
    
    <table border=1>
    	<tr>
    	 <th>Instructions</th>
    	 <th>Hours</th>
    	 <th>Material</th>
    	</tr>
    	<?php foreach ($instructions as $instruction): ?>
	    <tr>
	     <td><?php echo $instruction['instruction'] ?></td>
	     <td><?php echo $instruction['hours'] ?></td>
	     <td><?php echo $instruction['material']?></td>
	    </tr>
	<?php endforeach; ?>
    </table>
	
    <div class="spacer"></div>
    	
    <table>
    	<tr>
    	 <td>Total Hours</td>
    	 <td>Shop Rate</td>
    	 <td>Total Material</td>
    	 <td>Margin</td>
    	 <td>Total Price</td>
    	</tr>
    	<tr>
    	 <td><input type="text" disabled value="<?php echo $quote['totalHours'] ?>" /></td>
    	 <td><input type="text" disabled value="<?php echo money_format('%(n', $quote['shopRate']) ?>" /></td>
    	 <td><input type="text" disabled value="<?php echo money_format('%(n', $quote['totalMaterial']) ?>" /></td>
    	 <td><input type="text" disabled value="<?php echo $quote['margin'] ?>" /></td>
    	 <td><input type="text" disabled value="<?php echo money_format('%(n', $quote['totalPrice']); ?>" /></td>
    	</tr>
    </table>
    	
   <div class="spacer"></div>
   
   </form>
   </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>