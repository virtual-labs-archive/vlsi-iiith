// Synthesizable circuit (the "device-under-test")

module CombinationalCircuit (a,b,c,d,y);
	input a,b,c,d;
	output y;

	reg y;

	always @ (a or b or c or d)
		y <= (a==0) ? (a & b & c) : (a ^ b ^ c);

endmodule
