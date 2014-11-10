*MUX
.include '45nm_HP.pm'
M1 In1 clk  out Vdd PMOS l=50n w=450n
M2 In1 clk1 out 0   NMOS l=50n w=100n
M3 In2 clk1 out Vdd PMOS l=50n w=450n
M4 In2 clk  out 0   NMOS l=50n w=100n
Vdd Vdd 0 1.1
VIn1  In1  0 pulse (0    1   0 1n  1n  16n  30n  )
VIn2  In2  0 pulse (0    1   0 1n  1n  42n 80n  )
Vclk  clk  0 pulse (0   1  0 1n 1n 4n 8n  )
Vclk1 clk1 0 pulse (1   0  0 1n 1n 4n 8n  )
.tran 1n 100n
.save V(out) V(In1) V(In2) V(clk) 
.end
