	function search(){
		var name = document.getElementById("name").value;
		location.href = 'index.html?word=' + encodeURI("name");
		var age = document.getElementById("age").value;
		location.href = 'index.html?word=' + encodeURI("age");
	};

	function delite(){
		var id = document.getElementsById("id").value;
		location.href = 'index.html?word=' + encodeURI("id");
	};