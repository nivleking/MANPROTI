<?php
                require 'connect.php';
                if(isset($_POST['bongkar'])){
                    $bay = $_POST['bay'];
                    $baris = $_POST['baris'];
                    $kolom = $_POST['kolom'];
                    $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result);
                    $arr = json_decode($row['ship']);
                    
                    if($bay < 0 || $baris < 0 || $kolom < 0){
                        echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Koordinat dimulai dari 1');
                        window.location.href='game.php';
                        </script>");
                    }
                    else{
                        if($arr[$bay][$baris][$kolom] != 0){
                            if($baris-1 == -1){
                                $arr[$bay][$baris][$kolom] = 0;
                                $arr_enc = json_encode($arr);
                                $sql = "UPDATE user SET ship = '$arr_enc' WHERE team_name = 'AktoBabi'";
                                $result = mysqli_query($con,$sql);
                                echo ("<script LANGUAGE='JavaScript'>
                                window.alert('Berhasil Dibongkar');
                                window.location.href='game.php';
                                </script>");
                            }
                            if($arr[$bay][$baris-1][$kolom]==0){
                                $arr[$bay][$baris][$kolom] = 0;
                                $arr_enc = json_encode($arr);
                                $sql = "UPDATE user SET ship = '$arr_enc' WHERE team_name = 'AktoBabi'";
                                $result = mysqli_query($con,$sql);
                                echo ("<script LANGUAGE='JavaScript'>
                                window.alert('Berhasil Dibongkar');
                                window.location.href='game.php';
                                </script>");
                            }
                            else{
                                echo ("<script LANGUAGE='JavaScript'>
                                    window.alert('Ada Kontainer Diatasnya');
                                    window.location.href='game.php';
                                    </script>");
                            }
                        }
                        if($arr[$bay][$baris][$kolom] == 0){
                            echo ("<script LANGUAGE='JavaScript'>
                                    window.alert('Tidak ada kontainer yang dibongkar');
                                    window.location.href='game.php';
                                    </script>");
                        }

                    }

                }

                if(isset($_POST['pasang'])){
                    $bay = $_POST['bay'];
                    $baris = $_POST['baris'];
                    $kolom = $_POST['kolom'];
                    $kontainer = $_POST['kontainer'];
                    $sql = "SELECT ship FROM user WHERE team_name = 'AktoBabi'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result);
                    $arr = json_decode($row['ship']);
                    if($bay < 0 || $baris < 0 || $kolom < 0){
                        echo ("<script LANGUAGE='JavaScript'>
                                window.alert('Koordinat Dimulai dari 1');
                                window.location.href='game.php';
                                </script>");
                    }
                    else{
                        if($arr[$bay][$baris][$kolom]==0){
                            if(($baris < count($arr[$bay])-1) && $arr[$bay][$baris+1][$kolom]==0){
                                echo ("<script LANGUAGE='JavaScript'>
                                window.alert('Melayang, coba di cek kembali');
                                window.location.href='game.php';
                                </script>");
                            }
                            else{
                                if($arr[$bay][$baris][$kolom] > 0){
                                    echo ("<script LANGUAGE='JavaScript'>
                                    window.alert('Sudah ada kontainer !');
                                    window.location.href='game.php';
                                    </script>");
                                }
                                else{
                                    $arr[$bay][$baris][$kolom] = $kontainer;
                                    $arr_enc = json_encode($arr);
                                    $sql = "UPDATE user SET ship = '$arr_enc' WHERE team_name = 'AktoBabi'";
                                    $result = mysqli_query($con,$sql);
                                    echo ("<script LANGUAGE='JavaScript'>
                                    window.alert('Kontainer Berhasil Dimasukan !');
                                    window.location.href='game.php';
                                    </script>");
                                }
                                
                            }
                        }
                        
                    }
                }

            ?>
