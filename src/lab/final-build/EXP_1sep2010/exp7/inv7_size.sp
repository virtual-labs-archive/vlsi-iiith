*Gate Sizing
.include '45nm_HP.pm'
.option post=2
 MPMOS_1 N_3 In N_2 N_1 PMOS l=50n w=100n
 MNMOS_1 N_3 In Gnd Gnd NMOS l=50n w=100n
 MPMOS_2 N_4 N_3 N_6 N_5 PMOS l=50n w=100n
 MNMOS_2 N_4 N_3 Gnd Gnd NMOS l=50n w=100n
 MPMOS_3 N_7 N_4 N_9 N_8 PMOS l=50n w=100n
 MNMOS_3 N_7 N_4 Gnd Gnd NMOS l=50n w=100n
 MPMOS_4 N_10 N_7 N_12 N_11 PMOS l=50n w=100n
 MNMOS_4 N_10 N_7 Gnd Gnd NMOS l=50n w=100n
 MPMOS_5 Out N_10 N_14 N_13 PMOS  l=50n w=100n
 MNMOS_5 Out N_10 Gnd Gnd NMOS l=50n w=100n
VVoltageSource_10 N_13 Gnd  DC 1.1
VVoltageSource_1 N_2 Gnd  DC 1.1
VVoltageSource_2 N_6 Gnd  DC 1.1
VVoltageSource_3 N_1 Gnd  DC 1.1
VVoltageSource_4 N_5 Gnd  DC 1.1
VVoltageSource_5 N_9 Gnd  DC 1.1
VVoltageSource_6 N_8 Gnd  DC 1.1
VVoltageSource_7 N_12 Gnd  DC 1.1
VVoltageSource_8 N_11 Gnd  DC 1.1
VVoltageSource_9 N_14 Gnd  DC 1.1
CCapacitor_5 Out Gnd 100f
VVdd Vdd Gnd  DC 1.1
VIn In Gnd  PULSE( 0   1.1  0 1n  1n  5n  10n )
.tran 1n 100n
.print tran V(Out) V(In)
.save V(Out) V(In)
.end
