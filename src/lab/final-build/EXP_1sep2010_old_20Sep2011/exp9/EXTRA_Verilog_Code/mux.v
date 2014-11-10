`timescale 1ns/1ns
module mux( s1, s0, d3, d2, d1, d0, q );

input s1,s0;
input d3,d2,d1,d0;
output q;

reg q;

always @( s1 or s0 or d3 or d2 or d1 or d0)
begin
    q =       ( ~s0 & ~s1 & d0 )
            | (  s0 & ~s1 & d1 )
            | ( ~s0 &  s1 & d2 )
            | (  s0 &  s1 & d3 );
end

endmodule