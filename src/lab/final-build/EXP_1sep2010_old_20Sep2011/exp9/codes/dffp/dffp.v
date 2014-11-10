`timescale 1ns/1ns
module dffp(q,clk,d);
input d, clk; 
output q;
reg q;

always @ (posedge clk )
begin
q <= d;
end
endmodule 
