function ShowLength( str ) {
               str=str.replace(/\n/g, "");
               document.getElementById("inputlength").innerHTML = ""+ str.length ;
            }