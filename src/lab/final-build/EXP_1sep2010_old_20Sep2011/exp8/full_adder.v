module full_adder(a,b,cin,sum,cout);
	input a, b, cin;
	output sum, cout;

	assign sum = cin ^ a ^ b; // cin XOR a XOR b
	assign cout = ~cin & a & b | cin & (a | b); // cin'ab + cin(a + b)
endmodule
