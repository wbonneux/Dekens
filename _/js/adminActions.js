function setActive(id){
	 
	  $.post('setShActive.php', {id:id},function(data){
		  //confirm("Record set Active! "+id);
		  $("#inactive-"+id).addClass('label-success').removeClass('label-error');
		  $("#inactive-"+id).text('Ja');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#inactive-"+id).attr('id',"active-"+id);
		  $("#active-"+id).attr("onclick","setInactive("+id+")");
	  });
}

function setInactive(id){
	  $.post('setShInactive.php', {id:id},function(data){
		  //confirm("Record set Inactive! "+id);
		  $("#active-"+id).addClass('label-error').removeClass('label-success');
		  $("#active-"+id).text('Nee');
		  //$("#active-"+id).onclick("setActive("+id+")");
		  $("#active-"+id).attr('id',"inactive-"+id);
		  $("#inactive-"+id).attr("onclick","setActive("+id+")");
		  
	  });
}

function setDayActive(id){
	 
	  $.post('setDayActive.php', {id:id},function(data){
		  //confirm("Record set Active! "+id);
		  $("#inactive-"+id).addClass('label-success').removeClass('label-error');
		  $("#inactive-"+id).text('Ja');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#inactive-"+id).attr('id',"active-"+id);
		  $("#active-"+id).attr("onclick","setDayInactive("+id+")");
	  });
}

function setDayInactive(id){
	  $.post('setDayInactive.php', {id:id},function(data){
		  //confirm("Record set Inactive! "+id);
		  $("#active-"+id).addClass('label-error').removeClass('label-success');
		  $("#active-"+id).text('Nee');
		  //$("#active-"+id).onclick("setActive("+id+")");
		  $("#active-"+id).attr('id',"inactive-"+id);
		  $("#inactive-"+id).attr("onclick","setDayActive("+id+")");
		  
	  });
}

function setDayOpen(id){
	 
	  $.post('setDayOpen.php', {id:id},function(data){
		  //confirm("Record set Active! "+id);
		  $("#closed-"+id).addClass('label-error').removeClass('label-success');
		  $("#closed-"+id).text('Nee');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#closed-"+id).attr('id',"open-"+id);
		  $("#open-"+id).attr("onclick","setDayClosed("+id+")");
	  });
}

function setDayClosed(id){
	  $.post('setDayClosed.php', {id:id},function(data){
		  //confirm("Record set Inactive! "+id);
		  $("#open-"+id).addClass('label-success').removeClass('label-error');
		  $("#open-"+id).text('Ja');
		  //$("#active-"+id).onclick("setActive("+id+")");
		  $("#open-"+id).attr('id',"closed-"+id);
		  $("#closed-"+id).attr("onclick","setDayOpen("+id+")");
		  
	  });
}

function setDcActive(id){
	 
	  $.post('setDcActive.php', {id:id},function(data){
		  //confirm("Record set Active! "+id);
		  $("#inactive-"+id).addClass('label-success').removeClass('label-error');
		  $("#inactive-"+id).text('Ja');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#inactive-"+id).attr('id',"active-"+id);
		  $("#active-"+id).attr("onclick","setDcInactive("+id+")");
	  });
}

function setDcInactive(id){
	  $.post('setDoInactive.php', {id:id},function(data){
		  //confirm("Record set Inactive! "+id);
		  $("#active-"+id).addClass('label-error').removeClass('label-success');
		  $("#active-"+id).text('Nee');
		  //$("#active-"+id).onclick("setActive("+id+")");
		  $("#active-"+id).attr('id',"inactive-"+id);
		  $("#inactive-"+id).attr("onclick","setDcActive("+id+")");
		  
	  });
}

function setDoActive(id){
	 
	  $.post('setDcActive.php', {id:id},function(data){
		  //confirm("Record set Active! "+id);
		  $("#inactive-"+id).addClass('label-success').removeClass('label-error');
		  $("#inactive-"+id).text('Ja');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#inactive-"+id).attr('id',"active-"+id);
		  $("#active-"+id).attr("onclick","setDoInactive("+id+")");
	  });
}

function setDoInactive(id){
	  $.post('setDoInactive.php', {id:id},function(data){
		  //confirm("Record set Inactive! "+id);
		  $("#active-"+id).addClass('label-error').removeClass('label-success');
		  $("#active-"+id).text('Nee');
		  //$("#active-"+id).onclick("setActive("+id+")");
		  $("#active-"+id).attr('id',"inactive-"+id);
		  $("#inactive-"+id).attr("onclick","setDoActive("+id+")");
		  
	  });
}


function setRtActive(id){
	 
	  $.post('setRtActive.php', {id:id},function(data){
		  //confirm("Record set Active! "+id);
		  $("#inactive-"+id).addClass('label-success').removeClass('label-error');
		  $("#inactive-"+id).text('Ja');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#inactive-"+id).attr('id',"active-"+id);
		  $("#active-"+id).attr("onclick","setRtInactive("+id+")");
	  });
}

function setRtInactive(id){
	  $.post('setRtInactive.php', {id:id},function(data){
		  //confirm("Record set Inactive! "+id);
		  $("#active-"+id).addClass('label-error').removeClass('label-success');
		  $("#active-"+id).text('Nee');
		  //$("#active-"+id).onclick("setActive("+id+")");
		  $("#active-"+id).attr('id',"inactive-"+id);
		  $("#inactive-"+id).attr("onclick","setRtActive("+id+")");
		  
	  });
}

function setFpActive(id){
	 
	  $.post('setFpActive.php', {id:id},function(data){
		  //confirm("Record set Active! "+id);
		  $("#inactive-"+id).addClass('label-success').removeClass('label-error');
		  $("#inactive-"+id).text('Ja');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#inactive-"+id).attr('id',"active-"+id);
		  $("#active-"+id).attr("onclick","setFpInactive("+id+")");
	  });
}

function setFpInactive(id){
	  $.post('setFpInactive.php', {id:id},function(data){
		  //confirm("Record set Inactive! "+id);
		  $("#active-"+id).addClass('label-error').removeClass('label-success');
		  $("#active-"+id).text('Nee');
		  //$("#active-"+id).onclick("setActive("+id+")");
		  $("#active-"+id).attr('id',"inactive-"+id);
		  $("#inactive-"+id).attr("onclick","setFpActive("+id+")");
		  
	  });
}

function setSold(id){
	 
	  $.post('setShSold.php', {id:id},function(data){
		  //confirm("Record set Sold! "+id);
		  $("#unsold-"+id).addClass('label-success').removeClass('label-error');
		  $("#unsold-"+id).text('Ja');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#unsold-"+id).attr('id',"sold-"+id);
		  $("#sold-"+id).attr("onclick","setUnsold("+id+")");
	  });
}



function setUnsold(id){
	 
	  $.post('setShUnsold.php', {id:id},function(data){
		  //confirm("Record set Sold! "+id);
		  $("#sold-"+id).addClass('label-error').removeClass('label-success');
		  $("#sold-"+id).text('Nee');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#sold-"+id).attr('id',"unsold-"+id);
		  $("#unsold-"+id).attr("onclick","setSold("+id+")");
	  });
}

function setPosLeft(id){
	 
	  $.post('setPosLeft.php', {id:id},function(data){
		  //confirm("Record set Sold! "+id);
		  //$("#left-"+id).addClass('label-success').removeClass('label-error');
		  $("#right-"+id).text('Links');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#right-"+id).attr('id',"left-"+id);
		  $("#left-"+id).attr("onclick","setPosRight("+id+")");
	  });
}



function setPosRight(id){
	 
	  $.post('setPosRight.php', {id:id},function(data){
		  //confirm("Record set Sold! "+id);
		  //$("#left-"+id).addClass('label-error').removeClass('label-success');
		  $("#left-"+id).text('Rechts');
		 // $("#inactive-"+id).onclick("setInactive("+id+")");
		  $("#left-"+id).attr('id',"right-"+id);
		  $("#right-"+id).attr("onclick","setPosLeft("+id+")");
	  });
}

function deleteRt(id){
	if(confirm('Bent u zeker om dit record te verwijderen? Klik "Ok" om te bevestigen')){
//			alert('deleted');
		$.post('deleteRt.php', {id:id},function(data){
 			$("#rowid-"+id).remove();
 		});
	}else{
		//alert('delete cancelled');
	}
		
}

function deleteSh(id){
		if(confirm('Bent u zeker om dit record te verwijderen? Klik "Ok" om te bevestigen')){
// 			alert('deleted');
			$.post('deleteSh.php', {id:id},function(data){
	 			$("#rowid-"+id).remove();
	 		});
		}else{
			//alert('delete cancelled');
		}
			
}

function deleteFp(id){
	if(confirm('Bent u zeker om dit record te verwijderen? Klik "Ok" om te bevestigen')){
//			alert('deleted');
		$.post('deleteFp.php', {id:id},function(data){
 			$("#rowid-"+id).remove();
 		});
	}else{
		//alert('delete cancelled');
	}
		
}

function deleteDc(id){
	if(confirm('Bent u zeker om dit record te verwijderen? Klik "Ok" om te bevestigen')){
//			alert('deleted');
		$.post('deleteDc.php', {id:id},function(data){
 			$("#rowid-"+id).remove();
 		});
	}else{
		//alert('delete cancelled');
	}
		
}

function deleteDo(id){
	if(confirm('Bent u zeker om dit record te verwijderen? Klik "Ok" om te bevestigen')){
//			alert('deleted');
		$.post('deleteDo.php', {id:id},function(data){
 			$("#rowid-"+id).remove();
 		});
	}else{
		//alert('delete cancelled');
	}
		
}