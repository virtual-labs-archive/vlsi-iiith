 *D latch 
.include '45nm_HP.pm'
M1 In1 clk  out Vdd PMOS l=50n w=450n
M2 In1 clk1 out 0   NMOS l=50n w=100n
M3 In2 clk1 out Vdd PMOS l=50n w=450n
M4 In2 clk  out 0   NMOS l=50n w=100n
Vdd Vdd 0 1.1
M5 q1 out Vdd Vdd PMOS l=50n w= 450n
M6 q1 out 0 0   NMOS l=50n w=100n
cl q1 0 100f
M7 In2 q1 Vdd Vdd PMOS l=50n w= 450n
M8 In2 q1 0 0   NMOS l=50n w=100n
c2 In2 0 100f



Vdd Vdd 0 1.1
VIn1  In1  0 pulse (0    1   0 1n  1n  16n  30n  )

Vclk  clk  0 pulse (0   1  0 1n 1n 4n 8n  )
Vclk1 clk1 0 pulse (1   0  0 1n 1n 4n 8n  )
.tran 1n 100n
.save V(out) V(In1)  V(clk) V(q1)
.end
