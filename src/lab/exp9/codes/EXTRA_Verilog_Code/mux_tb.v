`timescale 1ns/1ns
module mux_tb;
	wire q;
	reg d3,d2,d1,d0,s1,s0;
	mux mux(s1, s0, d3, d2, d1, d0, q );
	initial
		begin
			#3 d3=1'b0;d2=1'b0;d1=1'b0;d0=1'b1; s1=1'b0;s0=1'b0;
			#5 d3=1'b0;d2=1'b0;d1=1'b0;d0=1'b0; s1=1'b0;s0=1'b1;
			#5 d3=1'b0;d2=1'b1;d1=1'b0;d0=1'b0; s1=1'b1;s0=1'b0;
			#5 d3=1'b1;d2=1'b0;d1=1'b0;d0=1'b0; s1=1'b1;s0=1'b1;
			
			end
//	initial
	//	$monitor(d3,d2,d1,d0,s1,s0,q);
//endmodule  

always @( s1 or s0 or d3 or d2 or d1 or d0)
#1 $display("t=%t",$time," s=%b",s1,s0," q=%b",q," d=%b%b%b%b",d3,d2,d1,d0);
endmodule