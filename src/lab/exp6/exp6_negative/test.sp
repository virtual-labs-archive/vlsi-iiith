*PositiveEdgeDFFbyNandGate

.include '45nm_HP.pm'



*************** Subcircuits *****************

.subckt Nand2 A B Out Gnd  

*-------- Devices: SPICE.ORDER > 0 --------

MNMOS_3 Out A N_2 Gnd NMOS l=50n w=100n  

MNMOS_4 N_2 B Gnd Gnd NMOS l=50n w=100n  

MPMOS_3 Out A N_1 N_3 PMOS l=50n w=450n  

MPMOS_4 Out B N_1 N_4 PMOS l=50n w=450n  

VVoltageSource_5 N_4 Gnd  DC 1.1 

VVoltageSource_6 N_1 Gnd  DC 1.1

VVoltageSource_2 N_3 Gnd  DC 1.1

.ends



.subckt nots In Out Gnd  

*-------- Devices: SPICE.ORDER > 0 --------

MNMOS_1 Out In Gnd Gnd NMOS l=50n w=100n  

MPMOS_1 Out In N_2 N_1 PMOS l=50n w=450n  

VVoltageSource_3 N_1 Gnd  DC 1.1 

VVoltageSource_1 N_2 Gnd  DC 1.1

.ends





********* Simulation Settings - Parameters and SPICE Options *********



Xnots_1 Clk N_5 Gnd nots  

XNand2_1 N_5 N_6 N_4 Gnd Nand2  

XNand2_2 N_5 N_4 N_3 Gnd Nand2  

XNand2_4 Q1 N_4 Q Gnd Nand2  

XNand2_5 N_3 Q Q1 Gnd Nand2  

XNand2_6 Clk D N_2 Gnd Nand2  

XNand2_7 Clk N_2 N_7 Gnd Nand2  

XNand2_8 N_8 N_2 N_6 Gnd Nand2  

XNand2_9 N_7 N_6 N_8 Gnd Nand2  

VVoltageSource_3 Clk Gnd  pulse (0 1.1 0 1n 1n 10n 22n)  

VVoltageSource_7 D Gnd  pulse (0 1.1 0 1n 1n 8n 32n)

********* Simulation Settings - Analysis section *********

.tran 1n 100n

.print tran V(D) V(clk) V(Q)

.save V(D) V(clk) V(Q)

********* Simulation Settings - Additional SPICE commands *********



.end



