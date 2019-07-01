# Experiment Test Cases Documentation

## Introduction

This document captures the test cases of the experiment.

## Functional Test Cases

| Test Case id |                             Test Scenario                            |                                       Test Steps                                       |                              Expected Output                             |                               Actual Output                              | Result |
|:------------:|:--------------------------------------------------------------------:|:--------------------------------------------------------------------------------------:|:------------------------------------------------------------------------:|:------------------------------------------------------------------------:|:------:|
| 1.           | Press Simulate button without selecting what type of simulation      | Directly click on simulate without selecting the type of simulation.                   | Alert: Please select type of simulation                                  | Alert: Please select type of simulation                                  | pass   |
| 2.           | Press Simulate button with mismatched circuit and simulation option. | Choose a simulation and make a circuit which is not the same as the simulation option. | Alert: This is not the correct circuit. Please refer procedure carefully | Alert: This is not the correct circuit. Please refer procedure carefully | pass   |
| 3.           | Alert when the connections/components are wrong.                     | Make an incorrect circuit and try to simulate it.                                      | Alert: This is not the correct circuit. Please refer procedure carefully | Alert: This is not the correct circuit. Please refer procedure carefully | pass   |    

## Cross Browser Testing

| Sl.no | Browser         | Version       | Works? |
|-------|-----------------|---------------|--------|
| 1.    | Google Chrome   | 75.0.3770.100 | Yes    |
| 2.    | Mozilla Firefox | 67.0.4        | yes    |

