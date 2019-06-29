# Experiment Test Cases Documentation

## Introduction

This document captures the test cases of the experiment.

## Functional Test Cases

| Test case id |                                     Test Scenario                                    |                              Test Steps                              |                            Expected Output                           |                             Actual Output                            | Result |
|:------------:|:------------------------------------------------------------------------------------:|:--------------------------------------------------------------------:|:--------------------------------------------------------------------:|:--------------------------------------------------------------------:|:------:|
| 1.           | Mandatory options not being selected  (must give alert)                              | Click on simulate without selecting a certain option                 | Choose an option!                                                    | Choose an Option!                                                    | pass   |
| 2.           | Selecting between input waveform and  custom waveform  (only one has to be selected) | Choose clock type and then don't choose any waveform option          | Choose a waveform!                                                   | Choose a waveform!                                                   | pass   |
| 3.           | Clock pulse can only be integer                                                      | For the clock pulse option input anything except an integer          | Invalid number of pulses                                             | Invalid number of pulses                                             | pass   |
| 4.           | Waveform has to only follow the  standard mentioned in help doc.                     | For the input waveform input a wrong waveform.                       | Invalid input waveform (refer help)                                  | Invalid input waveform (refer help)                                  | pass   |
| 5.           | No of clock pulses should not  window size.                                          | Enter a big number of clock pulses which could exceed size of window | Warning: Your waveform  could exceed the size  limit of your window. | Warning: Your waveform  could exceed the size  limit of your window. | pass   |
| 6.           | No of clock pulses should be  equal to the input waveform.                           | Make number of clock pulses not equal to input waveform length.      | No of pulses and length  of input waveform should  be same           | No of pulses and length  of input waveform should  be same           | pass   |
| 7.           | Simulate can still be pressed  without clearing the graph.                           | Simulate the graph and click on simulate  again                      | Simulate button is greyed out                                        | Simulate button is greyed out.                                       | pass   |

## Cross Browser Testing

| Sl.no | Browser         | Version       | Works? |
|-------|-----------------|---------------|--------|
| 1.    | Google Chrome   | 75.0.3770.100 | Yes    |
| 2.    | Mozilla Firefox | 67.0.4        | yes    |

