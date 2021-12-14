document.forms["addBlog"].addEventListener("submit", function(e) 
    {
 
	var erreur;
 
	var inputs = this.getElementsByTagName("input");
 
	for (var i = 0; i < inputs.length; i++) 
    {
		console.log(inputs[i]);
		if (!inputs[i].value) 
        {
			erreur = "Veuillez renseigner tous les champs";
		}
	}


    var nameBlog = document.getElementById("nameBlog");
	var categorieBlog = document.getElementById("categorieBlog");
	var editeurBlog = document.getElementById("editeurBlog");
	var contenuBlog = document.getElementById("contenuBlog");
 
	if (!contenuBlog.value) 
    {
		erreur = "Veuillez renseigner un contenu";
	}
    if (!editeurBlog.value)
    {
		erreur = "Veuillez renseigner un editeur";
	}
	if (!categorieBlog.value) 
    {
		erreur = "Veuillez renseigner une categorie";
	}
	if (!nameBlog.value) 
    {
		erreur = "Veuillez renseigner un nom";
	}




 
	if (erreur) 
    {
		e.preventDefault();
		document.getElementById("erreur").innerHTML = erreur;
		return false;
	} else 
    {
		alert('ADDED SUCCESSFULLY !');
	}
}); 

/*function Verif()
{
     
    var test=/^[A-Z]+$/;
    var ch=addBlog.name.value.substr(0,1);
    if (ch.match(test)==null)
    {
        alert("Nom Commence par lettre Maj ");
        return false;
    }

}*/

     
    
    

