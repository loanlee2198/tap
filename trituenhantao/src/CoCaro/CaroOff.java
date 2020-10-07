package CoCaro;

import java.awt.Color;
import java.awt.Font;
import java.awt.Graphics;
import java.awt.Point;
import java.awt.event.MouseEvent;
import java.awt.event.MouseListener;
import java.util.HashMap;
import java.util.Map;
import java.util.Random;
import java.util.Vector;

import javax.swing.JFrame;

public class CaroOff extends JFrame implements MouseListener{

	public static void main(String[] args) {
		new CaroOff();
	}
	
	int n = 10;
	int s = 30;
	int le = 70;
	Vector<Point> Dadanh = new Vector<>();
	Random rand = new Random();
	boolean isEnd = false;
	public CaroOff() {
		this.setTitle("Caro");
		this.setSize(le*2+n*s,le*2+n*s);
		this.setDefaultCloseOperation(3);
		
		this.addMouseListener(this);
		
		this.setVisible(true);
	}
	
	public void paint(Graphics g) {
		g.setColor(Color.WHITE);
		g.fillRect(0, 0, this.getWidth(), this.getHeight());
		
		g.setColor(Color.BLACK);
		for (int i=0;i<=n;i++) {
			g.drawLine(le, le+i*s, le+n*s, le+i*s);
			g.drawLine(le+i*s, le, le+i*s, le+n*s);
		}
		
		g.setFont(new Font("Arial", Font.BOLD, s));
		for (int i=0;i<Dadanh.size();i++) {
			String st = "o";
			if (i%2==1) {
				st = "x";
			}
			int x = Dadanh.get(i).x*s + le + s/2 - s/4;
			int y = Dadanh.get(i).y*s + le + s/2 + s/4;
			
			g.drawString(st, x, y);
		}
		int v1 = Value(1);
		int v2 = Value(2);
		g.drawString("o:"+v1, 100, le);
		g.drawString("x:"+v2, 200, le);
		
		if (v1==5 || v2==5) isEnd=true;
		
		if (isEnd) g.drawString("Finish!", 300, le);
	}

	Map<String,Integer> mp = new HashMap<String, Integer>();
	@Override
	public void mouseClicked(MouseEvent e) {
		if (isEnd) return; 
		int x = e.getX();
		int y = e.getY();
		if (x<le || x>=le+s*n) return;
		if (y<le || y>=le+s*n) return;
		//System.out.println(x+","+y);
		int ix = (x - le)/s;
		int iy = (y - le)/s;
		for (Point point : Dadanh) {
			if (ix == point.x && iy == point.y) return;
		}
		Point p = new Point(ix,iy);
		Dadanh.add(p);
		mp.put(p.x+","+p.y, 1);
		this.repaint();
		//AI
		
		Point pai = null;
		/*boolean ok = true;
		loop:do {
			pai = new Point(rand.nextInt(n),rand.nextInt(n));
			for (Point point : Dadanh) {
				if (pai.x == point.x && pai.y == point.y) continue loop;
			}
			break;
		}while(ok);*/
		Node node = new Node();
		Minimax(node,2,true);
		for (Node child:node.con) {
			System.out.println(child.value);
			if (child.value == node.value) {
				Dadanh.add(child.p);
				mp.put(child.p.x+","+child.p.y, 2);
				break;
			}
		}
		
		this.repaint();
	}
	
	int Minimax(Node node, int d, boolean MaxP) {
		//System.out.println("Minimax start"+d);
		if (EndNode(node) || d==0) {
			node.value = Value(2);
			return node.value;
		}
		for (int i=0;i<n;i++)
			for (int j=0;j<n;j++)
				if ((mp.get(i+","+j))==null) {
					Node c = new Node();
					c.p = new Point(i,j);
					c.cha = node;
					node.con.add(c);
				}
		
		if (MaxP) {
			int m = Integer.MIN_VALUE;
			
			for (Node child: node.con) {
				mp.put(child.p.x+","+child.p.y, 2);
				m = Math.max(m, Minimax(child, d-1, !MaxP));
				mp.put(child.p.x+","+child.p.y, null);
			}
			node.value = m;
			return node.value;
		} else {
			int m = Integer.MAX_VALUE;
			for (Node child: node.con) {
				mp.put(child.p.x+","+child.p.y, 1);
				m = Math.min(m, Minimax(child, d-1, !MaxP));
				mp.put(child.p.x+","+child.p.y, null);
			}
			node.value = m;
			return node.value;
		}
		
	}
	
	boolean EndNode(Node node) {
		if (Value(1)==5) return true;
		if (Value(2)==5) return true;
		for (int i=0;i<n;i++)
			for (int j=0;j<n;j++)
				if ((mp.get(i+","+j))==null) {
					return false;
				}
		
		return true;
	}
	
	int DP(int [][]a,int player, int dx,int dy) {
		int [][] dp = new int[n][n];
		int max = 0;
		for (int i=0;i<n;i++)
			for (int j=0;j<n;j++) {
				if (a[i][j]==player) {
						if (i+dx>=0 && i+dx<n && j+dy>=0 && j+dy<n)
							dp[i][j] = dp[i+dx][j+dy]+1;
						else dp[i][j] = 1;
						if (max<dp[i][j]) max = dp[i][j];
				}
			}
		return max;
	}

	Integer Value(int player) {
		int [][] a = new int[n][n];
		for (int i=0;i<n;i++)
			for (int j=0;j<n;j++)
				if (mp.get(i+","+j)!=null) {
					a[i][j] = mp.get(i+","+j);
				}
		//Tinh xem co truong hop thang nao hay khong
		int max = 0;
		max = Math.max(max, DP(a,player,-1,0));
		max = Math.max(max, DP(a,player,0,-1));
		max = Math.max(max, DP(a,player,-1,-1));
		max = Math.max(max, DP(a,player,-1,1));
		
		return max;
	}
	
	@Override
	public void mouseEntered(MouseEvent e) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void mouseExited(MouseEvent e) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void mousePressed(MouseEvent e) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void mouseReleased(MouseEvent e) {
		// TODO Auto-generated method stub
		
	}
}



