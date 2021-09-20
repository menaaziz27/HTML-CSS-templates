<template>
	<div class="calculator">
		<div class="display">{{ current || 0 }}</div>
		<div class="btn" @click="clear">AC</div>
		<div class="btn" @click="sign">+/-</div>
		<div class="btn" @click="percent">%</div>
		<div class="btn operator" @click="divide">/</div>
		<div class="btn" @click="append('7')">7</div>
		<div class="btn" @click="append('8')">8</div>
		<div class="btn" @click="append('9')">9</div>
		<div class="btn operator" @click="times">x</div>
		<div class="btn" @click="append('4')">4</div>
		<div class="btn" @click="append('5')">5</div>
		<div class="btn" @click="append('6')">6</div>
		<div class="btn operator" @click="minus">-</div>
		<div class="btn" @click="append('1')">1</div>
		<div class="btn" @click="append('2')">2</div>
		<div class="btn" @click="append('3')">3</div>
		<div class="btn operator" @click="add">+</div>
		<div class="btn zero" @click="append('0')">0</div>
		<div class="btn" @click="dot">.</div>
		<div class="btn operator" @click="equal">=</div>
	</div>
</template>

<script>
export default {
	name: 'Calculator',
	data() {
		return {
			previous: null,
			current: '',
			operator: null,
			operatorClicked: false,
		};
	},
	methods: {
		clear() {
			this.current = '';
			this.previous = null;
		},
		append(value) {
			if (this.operatorClicked) {
				this.current = '';
				this.operatorClicked = false;
			}
			this.current = `${this.current}${value}`;
		},
		sign() {
			this.current =
				this.current.charAt(0) === '-' ? this.current.slice(1) : `-${this.current}`;
		},
		percent() {
			this.current = parseFloat(this.current) / 100;
		},
		dot() {
			if (this.current.indexOf('.') === -1) {
				this.append('.');
			}
		},
		setPrevious() {
			this.operatorClicked = true;
			this.previous = this.current;
		},
		divide() {
			this.operator = (a, b) => a / b;
			this.setPrevious();
		},
		times() {
			this.operator = (a, b) => a * b;
			this.setPrevious();
		},
		minus() {
			this.operator = (a, b) => a - b;
			this.setPrevious();
		},
		add() {
			this.operator = (a, b) => a + b;
			this.setPrevious();
		},
		equal() {
			this.current = `${this.operator(
				parseFloat(this.previous),
				parseFloat(this.current)
			)}`;
		},
	},
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.calculator {
	display: grid;
	grid-template-columns: repeat(4, minmax(100px, 1fr));
	grid-auto-rows: minmax(50px, auto);
	margin: 0 auto;
	width: 400px;
	font-size: 40px;
	border: 1px solid black;
	border-radius: 7px;
	overflow: hidden;
}
.display {
	grid-column: 1 / 5;
	background: #333;
	color: white;
	padding: 8px;
}
.zero {
	grid-column: 1 / 3;
}
.btn {
	background-color: #f2f2f2;
	border: 1px solid #999;
	padding: 4px;
}
.operator {
	background-color: orange;
	color: white;
}

@media (max-width: 450px) {
	.calculator {
		width: 100%;
	}
}
</style>
