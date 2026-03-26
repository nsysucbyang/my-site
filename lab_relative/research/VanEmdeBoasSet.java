package annhy.algo.VanEmdeBoas;

import java.util.*;

/**
 * This class implements the van Emde Boas tree data structure, which works 
 * like a set of integers (a vector of bits) and is similar to 
 * <code>java.util.BitSet</code>. 
 * Each component of this set is an integer within the range <code>[0, uSize)</code>, 
 * where <code>uSize</code> is the university size.
 * When an instance of <code>VanEmdeBoasSet</code> to be constructed, 
 * the <code>uSize</code> is given and is never changed during its life time.
 * <p>
 * There are five main operations in <code>VanEmdeBoasSet</code>: 
 * testing, insertion, deletion, finding successor and predecessor. 
 * The time for each of the four operations is guaranteed to be 
 * <code>O(log log n)</code>.
 * But, on the other hand, the space requirement is always <code>\theta(uSize)</code>,
 * no matter how many elements are stored in the set.
 * <p>
 *
 * @author  Hsing-Yen Ann
 * @version 1.1, 2007/11/16
 */
public abstract class VanEmdeBoasSet {
  public static final int NIL = -1;
  // the threshold to use LeafSet
  public static final int MAX_LEAF_UNIVERSAL_SIZE = 4;

  // the five O(log log n) time operatios
  public abstract boolean contains(int x);
  public abstract boolean insert(int x);
  public abstract boolean delete(int x);
  public abstract int successor(int x);
  public abstract int predecessor(int x);

  // other abstract methods
  public abstract boolean isEmpty();
  public abstract int getMin();
  public abstract int getMax();
  public abstract List<Integer> toList();
  
  // data members
  protected int uSize;
  protected int size;

  // some alias methods
  public boolean get(int x) { return contains(x); }
  public void set(int x) { insert(x); }
  public void clear(int x) { delete(x); }
  
  // some concrete methods
  protected void rangeCheck(int x) {
    if (x < 0 || x >= uSize) {
      throw new IndexOutOfBoundsException("Illegal index: " + x);
    }
  }

  public int size() {
    return size;
  }
  
  public int universalSize() {
    return uSize;
  }
  
  @Override
  public String toString() {
    return toList().toString();
  }
  
  /**
   * Encapsulate the implementation detail - 
   * when the universal size is small than <code>MAX_LEAF_UNIVERSAL_SIZE</code> 
   * (inclusive), use linear implementation to reduce the number of objects.
   * 
   * If the universal size is not a power of 2, increase it to the smallest 
   * integer which is a power of 2.
   *
   * @param uSize the universal size
   * @return an instance of set
   */
  public static VanEmdeBoasSet newSet(int uSize) {
    uSize = 1 << (int)Math.ceil(Math.log(uSize) / Math.log(2));
    if (uSize <= MAX_LEAF_UNIVERSAL_SIZE) {
      return new LeafSet(uSize);
    }
    else {
      return new InternalSet(uSize);
    }
  }

  /**
   * 此 main() function 可供驗證 unit test 的正確性
   */
  public static void main(String[] args) {
    // 用 LeafSet 當作對照組
    VanEmdeBoasSet s1 = VanEmdeBoasSet.newSet(65536);
    VanEmdeBoasSet s2 = new LeafSet(65536);

    // initial set
    for (int i = 0; i < 1000; i++) {
      int r = (int)(Math.random() * 65536);
      s1.insert(r);
      s2.insert(r);
    }
    
    // randomly test
    int r;
    for (int i = 0; i < 10000; i++) {
      int act = (int)(Math.random() * 5);
      switch (act) {
        case 0:  // contains
          r = (int)(Math.random() * 75536) - 5000;
          if (s1.contains(r) != s2.contains(r)) {
            System.out.println("r=" + r);
            System.out.println("s1.contains(r)=" + s1.contains(r));
            System.out.println("s2.contains(r)=" + s2.contains(r));
            System.out.println("s1=" + s1);
            System.out.println("s2=" + s2);
            System.out.println();
            return;
          }
          break;

        case 1:  // insert
          r = (int)(Math.random() * 65536);
          if (s1.insert(r) != s2.insert(r)) {
            System.out.println("s1.insert(r) != s2.insert(r)   r=" + r);
          }
          if (!s1.toList().equals(s2.toList())) {
            System.out.println("s1=" + s1);
            System.out.println("s2=" + s2);
            System.out.println();
            return;
          }
          break;

        case 2:  // delete
          r = (int)(Math.random() * 65536);
          if (s1.delete(r) != s2.delete(r)) {
            System.out.println("s1.delete(r) != s2.delete(r)   r=" + r);
          }
          if (!s1.toList().equals(s2.toList())) {
            System.out.println("s1=" + s1);
            System.out.println("s2=" + s2);
            System.out.println();
            return;
          }
          break;

        case 3:  // successor
          r = (int)(Math.random() * 75536) - 5000;
          if (s1.successor(r) != s2.successor(r)) {
            System.out.println("r=" + r);
            System.out.println("s1.successor(r)=" + s1.successor(r));
            System.out.println("s2.successor(r)=" + s2.successor(r));
            System.out.println("s1=" + s1);
            System.out.println("s2=" + s2);
            System.out.println();
            return;
          }
          break;

        case 4:  // predecessor
          r = (int)(Math.random() * 75536) - 5000;
          if (s1.predecessor(r) != s2.predecessor(r)) {
            System.out.println("r=" + r);
            System.out.println("s1.predecessor(r)=" + s1.predecessor(r));
            System.out.println("s2.predecessor(r)=" + s2.predecessor(r));
            System.out.println("s1=" + s1);
            System.out.println("s2=" + s2);
            System.out.println();
            return;
          }
      }
    }
    
    System.out.println("s1=" + s1);
    System.out.println("s2=" + s2);
    System.out.println(s1.toList().equals(s2.toList()));
  }

  /**
   * This class implements an internal node of the van Emde Boas tree. 
   */
  private static class InternalSet extends VanEmdeBoasSet {
    // data members
    private int min = NIL;
    private int max = NIL;
    private int highBits;
    private int lowBits;
    private VanEmdeBoasSet summary;
    private VanEmdeBoasSet[] subWidgets;
    
    /**
     * Construct an internal set node, note that 'Lazy Initialization' is not
     * allowed for van Emde Boas tree.
     * @param uSize the universal size
     */
    public InternalSet(int uSize) {
      // determine the numbers of lower bits and high bits  
      this.uSize = uSize;
      int nBits = (int)Math.ceil(Math.log(uSize) / Math.log(2));
      this.lowBits = nBits / 2;
      this.highBits = nBits - this.lowBits;
      
      // construct the hole strucure recursively
      this.summary = VanEmdeBoasSet.newSet(1 << this.highBits);
      this.subWidgets = new VanEmdeBoasSet[1 << this.highBits];
      for (int i = 0; i < this.subWidgets.length; i++) {
        this.subWidgets[i] = VanEmdeBoasSet.newSet(1 << this.lowBits);
      }
    }
    
    @Override
    public boolean contains(int x) {
      if (this.isEmpty()) {
        return false;
      }
      if (x < this.min || x > this.max) {
        return false;
      }
      if (x == this.min || x == this.max) {
        return true;
      }
      return subWidgets[highOf(x)].contains(lowOf(x));
    }

    @Override
    public boolean insert(int x) {
      rangeCheck(x);

      // the first insertion
      if (this.isEmpty()) {
        this.min = x;
        this.max = x;
        size++;
        return true;
      }

      // the second insertion
      if (this.min == this.max) {
        if (this.min == x) {
          return false;
        }
        else {
          this.min = Math.min(this.min, x);
          this.max = Math.max(this.max, x);
          size++;
          return true;
        }
      }

      // other insertions need recursive insertions
      // 第三個以後, 才要在 summary 中作紀錄
      int toInsert = x;
      if (x == this.min || x == this.max) {
        // if x is set as min/max, no insertion is needed
        return false;
      }
      else if (x < this.min) {
        toInsert = this.min;
        this.min = x;
      }
      else if (x > this.max) {
        toInsert = this.max;
        this.max = x;
      }

      // the first insertion to sub-widget needs to set summary
      if (this.subWidgets[highOf(toInsert)].isEmpty()) {
        this.summary.insert(highOf(toInsert));
      }
      // 若上面的 if 成立，則此 recursive 只會往下一層
      boolean inserted = this.subWidgets[highOf(toInsert)].insert(lowOf(toInsert));
      if (inserted) {
        size++;
      }
      return inserted;
    }
    
    @Override
    public boolean delete(int x) {
      rangeCheck(x);

      // no deletion needed
      if (this.isEmpty() || x < this.min || x > this.max) {
        return false;
      }

      // x is the last one (x == this.min == this.max)
      if (this.min == this.max) {
        // 前一個 if block 已經確認過 x 在 [min,max] 之間 
        this.min = NIL;
        this.max = NIL;
        size--;
        return true;
      }

      // only 2 values in this widget
      if (this.summary.isEmpty()) {
        if (x == this.min) {
          // delete min
          this.min = this.max;
          size--;
          return true;
        }
        else if (x == this.max) {
          // delete max
          this.max = this.min;
          size--;
          return true;
        }
        else {
          return false;
        }
      }

      // there are at least 3 values
      int toDelete = x;
      if (x == this.min) {
        // delete the min, and move the 2nd min to min
        // delete the 2nd min in sub-widget (summary 中找得到的是第二小的)
        int minW = this.summary.getMin();
        toDelete = (minW << lowBits) + this.subWidgets[minW].getMin();
        this.min = toDelete;
      }
      else if (x == this.max) {
        // delete the max, and move the 2nd max to max
        // delete the 2nd max in sub-widget (summary 中找得到的是第二大的)
        int maxW = this.summary.getMax();
        toDelete = (maxW << lowBits) + this.subWidgets[maxW].getMax();
        this.max = toDelete;
      }

      // delete x in the sub-widget
      boolean deleted = this.subWidgets[highOf(toDelete)].delete(lowOf(toDelete));

      // the last deletion to sub-widget needs to clear summary
      // 若此 if 成立，則上面的 recursive 只會往下一層
      if (this.subWidgets[highOf(toDelete)].isEmpty()) {
        this.summary.delete(highOf(toDelete));
      }  

      if (deleted) {
        size--;
      }
      return deleted;
    }
    
    @Override
    public int successor(int x) {
      // this set is empty
      if (this.isEmpty()) {
        return NIL;
      }

      // x in range [-INF, min)
      if (x < this.getMin()) {
        return this.getMin();
      }
      // x in range [max, INF]
      if (x >= this.getMax()) {
        return NIL;
      }
      // x in range [2ndMax, max)
      if (this.summary.isEmpty() || this.get2ndMax() <= x) {
          return this.getMax();
      }

      // 剩下的在這個範圍: x in range [min, 2ndMax)
      if (!this.subWidgets[highOf(x)].isEmpty() 
          && lowOf(x) < this.subWidgets[highOf(x)].getMax()) {
        // x and its successor are in the same sub-widget
        int low = this.subWidgets[highOf(x)].successor(lowOf(x));
        return (highOf(x) << lowBits) + low;
      }
      else {
        // find the next non-empty sub-widget
        int high = this.summary.successor(highOf(x));
        int low = this.subWidgets[high].getMin();
        return (high << lowBits) + low;
      }
    }
    
    @Override
    public int predecessor(int x) {
      // this set is empty
      if (this.isEmpty()) {
        return NIL;
      }

      // x in range (max, INF]
      if (x > this.getMax()) {
        return this.getMax();
      }
      // x in range [-INF, min]
      if (x <= this.getMin()) {
        return NIL;
      }
      // x in range (min, 2ndMin]
      if (this.summary.isEmpty() || this.get2ndMin() >= x) {
          return this.getMin();
      }

      // 剩下的在這個範圍: x in range (2ndMin, max]
      if (!this.subWidgets[highOf(x)].isEmpty() 
          && lowOf(x) > this.subWidgets[highOf(x)].getMin()) {
        // x and its predecessor are in the same sub-widget
        int low = this.subWidgets[highOf(x)].predecessor(lowOf(x));
        return (highOf(x) << lowBits) + low;
      }
      else {
        // find the last non-empty sub-widget
        int high = this.summary.predecessor(highOf(x));
        int low = this.subWidgets[high].getMax();
        return (high << lowBits) + low;
      }
    }
    
    public int getMin() {
      return this.min;
    }
    public int getMax() {
      return this.max;
    }
    
    private int get2ndMax() {
      int maxW = this.summary.getMax();
      return (maxW << lowBits) + this.subWidgets[maxW].getMax();
    }

    private int get2ndMin() {
      int minW = this.summary.getMin();
      return (minW << lowBits) + this.subWidgets[minW].getMin();
    }
    public boolean isEmpty() {
      return (this.min == NIL);
    }
    
    private int highOf(int x) {
      return x >> lowBits;
    }
    private int lowOf(int x) {
      int mask = (1 << lowBits) - 1;
      return x & mask;
    }
    
    @Override
    public List<Integer> toList() {
      List<Integer> list = new ArrayList<Integer>();
      for (int i = successor(-1); i != NIL; i = successor(i)) {
          list.add(i);
      }
      return list;
    }
  }


  /**
   * This class implements a leaf node of the van Emde Boas tree. 
   * To increase the efficiency, this set is implement of a boolean array.
   */
  private static class LeafSet extends VanEmdeBoasSet {
    // each operation is performed by delegation
    private boolean[] isSet;
    
    public LeafSet(int uSize) {
      this.uSize = uSize;
      this.isSet = new boolean[uSize];
    }

    public boolean contains(int x) {
      if (x < 0 || x >= uSize) {
        return false;
      }
      return isSet[x];
    }

    /**
     * @param x the number to be inserted
     * @return x was not contained in this set and has been inserted successfully 
     */
    public boolean insert(int x) {
      rangeCheck(x);
      if (!isSet[x]) {
        isSet[x] = true;
        size++;
        return true;
      }
      return false;
    }

    /**
     * @param x the number to be inserted
     * @return x was contained in this set and has been deleted successfully 
     */
    public boolean delete(int x) {
      rangeCheck(x);
      if (isSet[x]) {
        isSet[x] = false;
        size--;
        return true;
      }
      return false;
    }

    public int successor(int x) {
      for (int i = Math.max(0, x+1); i < uSize; i++) {
        if (isSet[i]) {
          return i;
        }
      }
      return NIL;
    }

    public int predecessor(int x) {
      for (int i = Math.min(uSize, x)-1; i >= 0; i--) {
        if (isSet[i]) {
          return i;
        }
      }
      return NIL;
    }

    public int getMin() {
      return successor(-1);
    }

    public int getMax() {
      return predecessor(uSize);
    }

    public boolean isEmpty() {
      return (size == 0);
    }

    @Override
    public List<Integer> toList() {
      List<Integer> list = new ArrayList<Integer>();
      for (int i = 0; i < uSize; i++) {
        if (isSet[i]) {
          list.add(i);
        }
      }
      return list;
    }
  }
}
