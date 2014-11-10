*xor
.include '45nm_HP.pm'

M3 n a Vdd Vdd PMOS l=50n w= 450n
M4 n b1 Vdd Vdd PMOS l=50n w= 450n
M5 out a1 n Vdd PMOS l=50n w= 450n
M6 out b n Vdd PMOS l=50n w= 450p

M9 out a p 0  NMOS l=50n w=100n
M10 out a1 q 0  NMOS l=50n w=100n
M11 p b1 0  0  NMOS l=50n w=100n
M12 q b 0 0  NMOS l=50n w=100n
cl out 0 100f
Vdd Vdd 0 1.1
Va a 0 pulse (0 1.1 0 1n 1n 5n 10n)
Vb b 0 pulse (0 1.1 0 1n 1n 10n 20n)
Va1 a1 0 pulse (1.1 0 0 1n 1n 5n 10n)
Vb1 b1 0 pulse (1.1 0 0 1n 1n 10n 20n)
.tran 1n 100n 
*.print V(A) V(B)
*.print V(out)
.save V(out) V(a) V(b) v(a1) v(b1)
.end
