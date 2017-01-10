<?php
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/helpers/Pgn.php';

/**
 * 
 * @author oddg
 *
 */
class PolarbookControllerTest extends JControllerLegacy
{
	public function BasicBoard()
	{
		echo "<h2>BasicBoard</h2>";
	}

	public function ChessBoard()
	{
		echo "<h2>ChessBoard</h2>";
		$fen="rnbqkbnr/ppppp2p/6p1/4Pp2/8/8/PPPP1PPP/RNBQKBNR w KQkq f6";
		echo "\$cb = new ChessBoard()<br/>";
		$cb = new ChessBoard();
		
		echo "\$cb->setFen('" . $fen . "')<br/>";
		$cb->setFen($fen);
		echo "\$cb->getFen()<br/>";
		echo $cb->getFen() . "<br/>";
		
	}

	public function MoveGenerator()
	{
		$cb = new ChessBoard();
		echo "<h2>Move generator</h2>";
		$fen="4k2r/rppp1ppp/1b3nbN/nPB5/B1P1P3/q4N2/Pp1P2PP/1R1Q1RK1 b kq -";
		for ($i=1; $i<4; $i++)
		{
			$cb->setFen($fen);
			$t1=time();
			$n=$this->movegenTest($i, $cb);
			$t2=time()-$t1;
			echo $i . " - " . $n . " - " . $t2 . "<br />";
		}
	}
	
	public function ChessGame()
	{
		echo "<h2>ChessGame</h2>";
		$game=new ChessGame();
		$game->startposition('rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1');
		var_dump($game);
	}
	
	public function Pgn()
	{
		echo "<h2>Pgn</h2>";
		$pgn=new Pgn();
		$game=new ChessGame();
		$s=
			"[Event \"Turnering\"]\n"
			."[Site \"Spilested\"]\n"
			."[Round \"1\"\n"
			."[White \"Hvit\"\n"
			."[Black \"Sort\"\n"
			."[Date \"2013.05.27\"\n"
			."[Result \"*\"\n\n"
			."1.e4 e5 2.Nf3 Nc6 3.Bb5 a6 *";
		$pgn->read($s,$game);
		var_dump($game);
	}
	
	function movegenTest($depth, $cb)
	{
		return $this->rec_movegen($depth, 0, $cb, 0);
	}
	
	function rec_movegen($depth, $ply, $cp, $nodes)
	{
		$moveit = 0;
		$b = new ChessBoard();
		$ml = new MoveList();
		$cp->makeMoves($ml);
//		for ($i=0;$i<$ml->size;$i++)
//			echo $b->longMove($ml->move[$i]) . "<br />";
		while ($moveit<$ml->size)
		{
			if ($depth > 1)
			{
//				$n1=$nodes;
				$b->copy($cp);
				$b->doMove($ml->move[$moveit]);
				$nodes = $this->rec_movegen($depth - 1, $ply + 1, $b, $nodes);
//				if ($ply==0)
//					echo $b->longMove($ml->move[$moveit]) . " - n=" . ($nodes-$n1) . "<br />"; 
			}
			else
			{
//				echo $b->longMove($ml->move[$moveit]) . "<br />";
				++$nodes;
			}
			++$moveit;
		}
		return $nodes;
	}
}
