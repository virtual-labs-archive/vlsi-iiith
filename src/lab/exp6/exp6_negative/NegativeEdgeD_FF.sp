*NegativeEdgeD flip flop 
.include '45nm_HP.pm'
.option post=2
M1 D clk1  out Vdd PMOS l=50n w=450n
M2 D clk out 0   NMOS l=50n w=100n
M3 In2 clk out Vdd PMOS l=50n w=450n
M4 In2 clk1  out 0   NMOS l=50n w=100n
Vdd Vdd 0 1.1
M5 q out Vdd Vdd PMOS l=50n w= 450n
M6 q out 0 0   NMOS l=50n w=100n
cl q 0 100f
M7 In2 q Vdd Vdd PMOS l=50n w= 450n
M8 In2 q 0 0   NMOS l=50n w=100n
c2 In2 0 100f

M9 q clk out1 Vdd PMOS l=50n w= 450n
M10 q clk1 out1 0 NMOS l=50n w=100n
M11 In3 clk1 out1 Vdd PMOS l=50n w= 450n
M12 In3 clk out1 0 NMOS l=50n w=100n
M13 q1 out1 Vdd Vdd PMOS l=50n w= 450n
M14 q1 out1 0 0   NMOS l=50n w=100n
c3 q 0 100f
M15 In3 q1 Vdd Vdd PMOS l=50n w= 450n
M16 In3 q1 0 0   NMOS l=50n w=100n
c4 In3 0 100f

VClk clk 0  PULSE(0 1.1 0 100p 100p 1550n 3000n)  
VClk1 clk1 0  PULSE(1.1 0 0 100p 100p 1550n 3000n)  
VIn1 D 0  PULSE(0 1.1 0 100p 100p 95n 200n)
.tran 10ns 20000n
*.print tran V(out) V(q) V(clk) V(clk1) V(D)
.save  V(q) V(clk) V(D)
.end

*VIn1  In1  0 pulse (0    1.1   0 1n  1n  16n  30n  )
*Vclk  clk  0 pulse (0   1.1  0 1n 1n 4n 8n  )
*Vclk1 clk1 0 pulse (1.1   0  0 1n 1n 4n 8n  )
*.tran 1n 100n
