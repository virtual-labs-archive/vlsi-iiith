// Testbench for "CombinationalCircuit" module
//
// Illustrates efficient way to exhaustively test
// a combinational circuit

module CombinationalCircuit_TB;
	reg a,b,d,c;
	wire y;

	// Instantiate the device-under-test
	CombinationalCircuit DUT (
		.a(a),
		.b(b),
		.c(c),
		.d(d),
		.y(y)
	);

	// Declare loop index variable
	integer k;

	// Apply input stimulus
	initial begin
		{a,b,c,d} = 0;

		for (k=0; k<=16; k=k+1)
			#5 {a,b,c,d} = k;

	#20	$finish;
	end

endmodule
