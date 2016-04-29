<!--<p class='demo'><a href='sezione/stampa/cvoltremare.php' target='_blank' class='demo'>[Scarica]</a></p>-->
<style>
 
fieldset { 
    -moz-border-radius:5px; 
    -webkit-border-radius:5px; 
    margin-bottom:10px; 
} 
legend { 
    background:#3333FF; 
    color:#fff; 
    padding:3px 15px; 
    -moz-border-radius:5px; 
    -webkit-border-radius:5px; 
    font-weight:bold; 
} 

p { 
    padding:2px; 
} 
label { 
    display:inline-block; 
    width:100px; 
    font-weight:bold; 
} 
label:after { 
    content: ":"; 
} 
input { 
    display:inline-block; 
    width:200px; 
    border:1px solid #ccc; 
    padding:5px; 
    margin:0; 
    -moz-border-radius:5px; 
    -webkit-border-radius:5px; 
} 
thead  td { 
    text-align:center; 
    font-weight:bold; 
} 
td + td > input { 
    width:50px; 
} 
button { 
    border:1px solid #474747; 
    background:#ccc; 
    -moz-border-radius:5px; 
    -webkit-border-radius:5px; 
    padding:10px; 
    margin:10px; 
    font-weight:bold; 
    font-size:200%; 
} 
button:hover { 
    background:#ececec; 
    cursor:pointer; 
}
</style>

<div ng-controller="StampaCtrl">
<form method="post" action="sezione/stampa/create_reciept.php"> 
<div ng-repeat="detail in details">
 <fieldset> 
    <legend>Informazione</legend> 
        
     <div class="col-md-5">
        <div class="form-group">
           <div class="well well-sm" id="generale">Nome: &nbsp;<strong>{{detail.name}}</strong></div>
        </div>

        <div class="form-group">
             <div class="well well-sm" id="generale">Cognome: &nbsp;<strong>{{detail.surname}}</strong></div>
        </div>
    </div> 
    <div class="col-md-5">
         <div class="form-group"> 
            <div class="well well-sm" id="generale">Tessera FIV: &nbsp;<strong>{{detail.fiv}}</strong></div>
        </div>
         <div class="form-group"> 
            <div class="well well-sm" id="generale">Scadenza FIV: &nbsp;<strong>{{detail.fiv_scadenza}}</strong></div>
        </div>
         <div class="form-group"> 
            <div class="well well-sm" id="generale">Tessera UISP: &nbsp;<strong>{{detail.tess_uisp}}</strong></div>
        </div>
         <div class="form-group"> 
            <div class="well well-sm" id="generale">Tessera UISP: &nbsp;<strong>{{detail.tess_uisp}}</strong></div>
        </div>
        
       
    </div> 
</fieldset>
<fieldset> 
    <legend>Attivita' Oltremare</legend> 
    	<div class="col-md-5">
        	<div class="form-group">
            	 <div class="well well-sm" id="generale">Attivita: &nbsp;<strong>{{detail.attivita}}</strong></div>
        	</div>
        	 <div class="form-group">
	           <div class="well well-sm" id="generale">Scuola: &nbsp;<strong>{{detail.scuola}}</strong></div>
    	    </div>
    	    <div class="form-group">
	           <div class="well well-sm" id="generale">Sede: &nbsp;<strong>{{detail.sede}}</strong></div>
    	    </div>
    	    <div class="form-group">
	           <div class="well well-sm" id="generale">Anno: &nbsp;<strong>{{detail.anno}}</strong></div>
    	    </div>
    </div> 
</fieldset>
<fieldset> 
    <legend>Attivita' in altre scuole Oltremare</legend> 
    	<<div class="col-md-5">
        	<div class="form-group">
            	 <div class="well well-sm" id="generale">Attivita: &nbsp;<strong>{{detail.attivita}}</strong></div>
        	</div>
        	 <div class="form-group">
	           <div class="well well-sm" id="generale">Scuola: &nbsp;<strong>{{detail.scuola}}</strong></div>
    	    </div>
    	    <div class="form-group">
	           <div class="well well-sm" id="generale">Sede: &nbsp;<strong>{{detail.sede}}</strong></div>
    	    </div>
    	    <div class="form-group">
	           <div class="well well-sm" id="generale">Anno: &nbsp;<strong>{{detail.anno}}</strong></div>
    	    </div>
    </div> 
</fieldset>
<fieldset> 
    <legend>Titoli/Abilitazioni Conseguiti</legend> 
    	<div class="col-md-5">
        <div class="form-group">
           <div class="well well-sm" id="generale">Abilitazione: &nbsp;<strong>{{detail.abilitazione}}</strong></div>
        </div>
    </div> 
</fieldset>
<button type="submit">Stampa</button>
    </form> 
</div></div>
