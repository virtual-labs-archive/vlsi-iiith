`timescale 1ns/1ns
module dffn(q,clk,d);
input d, clk; 
output q;
reg q;

always @ (negedge clk )
begin
q <= d;
end
endmodule 