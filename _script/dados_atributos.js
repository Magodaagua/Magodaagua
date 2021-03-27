
    var dado = 0;
	var nums = [];
    var atributos = [];
    for(var aux = 0; aux < 6; aux ++){
		for(var aux2 = 0; aux2 < 4; aux2++){
			dado = parseInt(Math.random() * 6 + 1);
			nums[aux2] = dado;
		}
		var maior = 0;
		var maiores = [];
		var nums2 = [];
		nums2[0] = nums[0];
		nums2[1] = nums[1];
		nums2[2] = nums[2];
		nums2[3] = nums[3];
		for(var i = 0; i < nums.length; i++){
			if(nums[i] > maior){
				maior =  nums[i];
				nums.splice(i, 1);
			}
		}
		maiores[0] = maior;
		
		maior = 0;
		for(var i = 0; i < nums.length; i++){
			if(nums[i] > maior){
				maior =  nums[i];
				nums.splice(i, 1);
			}
		}
		maiores[1] = maior;
		
		maior = 0;
		for(var i = 0; i < nums.length; i++){
			if(nums[i] > maior){
				maior = nums[i];
				nums.splice(i, 1);
			}
		}
		maiores[2] = maior;
		
		var soma = 0;
		for(var i = 0; i < maiores.length; i++){
			soma += maiores[i];
		}
		document.write(soma + " - ");
		atributos[aux] = maior;
	//document.getElementById("alo").innerHTML = atributos;
    //document.getElementById("alo").innerHTML ="a: " + atributos[0] + " b: " + atributos[1] + " c: " + atributos[2];
}
