<div class="container">
			<button class="btn btn-inside btn-boarder"><img src="https://i.cloudup.com/gBzAn-oW_S-2000x2000.png" width="64px" height="64px" id="plane"></button>
			<div class="bg"><img src="https://i.cloudup.com/2ZAX3hVsBE-3000x3000.png" id="bg" width="32px" height="32px" style="opacity:0;"></div>
			<div class="around around-boarder" onclick="ani(); anitwo();"></div>
		</div>
        <style>
            html {
	background: #FF7F50;
	/* -webkit-background-size: cover; */
	/* -moz-background-size: cover; */
	/* -o-background-size: cover; */
	/* background-size: cover; */
	/* overflow: hidden; */
}

.container {
	width: 500px;
	height: 500px;
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	right: 0;
	margin: auto;
}

.btn {
	width: 100px;
	height: 100px;
    border: none;
    color: inherit;
    background: none;
    display: inline-block;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 300;
    outline: none;
    position: absolute;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

.btn img{
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

.btn:after {
    content: '';
    position: absolute;
    z-index: -1;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
}

.bg {
    height: 32px;
    width: 32px;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

.btn-boarder {
    border: 2px solid #fff;
    border-radius: 0px;
}

.animation {
    -webkit-transform: translate(100px, -100px);
    -moz-transform: translate(100px, -100px);
    -o-transform: translate(100px, -100px);
    -ms-transform: translate(100px, -100px);
    transform: translate(100px, -100px);
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s linear;
    -o-transition: all 0.3s linear;
    transition: all 0.3s linear;
}

.animation2 {
    -webkit-animation: fadeIn 0.4s ease-out;
    -webkit-animation-iteration-count: 1;
    -webkit-animation-fill-mode: forwards;
    -webkit-animation-delay: 0.4s;
    -moz-animation: fadeIn 0.4s ease-out;
    -moz-animation-iteration-count: 1;
    -moz-animation-fill-mode: forwards;
    -moz-animation-delay: 0.4s;
    animation: fadeIn 0.4s ease-out;
    animation-iteration-count: 1;
    animation-fill-mode: forwards;
    animation-delay: 0.4s;
}

@-webkit-keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}

@keyframes fadeIn {
    0% {
        opacity: 0;
    }

    100% {
        opacity: 1;
    }
}
.around {
    width: 101px;
    height: 101px;
    border: none;
    color: inherit;
    background: none;
    cursor: pointer;
    display: inline-block;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 300;
    outline: none;
    position: absolute;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
}

.around:after {
    content: '';
    position: absolute;
    z-index: -1;
}

.around-boarder {
    border: 120px solid #FF7F50;
    border-radius: 50%;
}
</style>

<script>
     function ani(){
            document.getElementById('plane').className ='animation';
        }
        function anitwo(){
            document.getElementById('bg').className ='animation2';
        }
        </script>
        